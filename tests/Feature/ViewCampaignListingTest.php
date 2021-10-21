<?php

namespace Tests\Feature;

use App\Models\User;
use Domain\AdvertCampaigns\Models\AdvertCampaign;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ViewCampaignListingTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @return void
     */
    public function userCanViewCampaignListing()
    {
        $user = User::factory()->withAdvertCampaigns(4)->create();
        Sanctum::actingAs($user);
        $response = $this->get('api/advert_campaigns');

        $response->assertJson(function (AssertableJson $json) use ($user) {
            $json->has('data', 4)
                ->has('meta')
                ->has('links')
                ->etc();

            $user->advertCampaigns->each(fn ($adCampaign, $i) => (
                $json->has("data.{$i}", fn ($json) => (
                    $json->where('id', $adCampaign->id)
                        ->where('name', $adCampaign->name)
                        ->where('daily_budget', (double) $adCampaign->daily_budget)
                        ->where('total_budget', (double) $adCampaign->total_budget)
                        ->etc()
                ))
            ));
        });
    }

    /**
     * @test
     * @return void
     */
    // public function canCreateNewAdvertCampaign()
    // {
        // make a request to the endpoint for storing
        // $response =
        // ensure that there is a record in the database with the specified name of the inserted advert campaign
        // check the uploaded files
    // }
}
