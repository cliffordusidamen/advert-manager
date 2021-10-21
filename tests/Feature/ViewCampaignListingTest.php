<?php

namespace Tests\Feature;

use App\Models\AdvertCampaign;
use App\Models\User;
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
        $user = User::factory()->create();
        AdvertCampaign::factory()->count(4)->create();
        $adCampaigns = AdvertCampaign::all();
        Sanctum::actingAs($user);
        $response = $this->get('api/advert_campaigns');

        $response->assertJson(function (AssertableJson $json) use ($adCampaigns) {
            $json->has('data', 4)
                ->has('meta')
                ->has('links')
                ->etc();

            $adCampaigns->each(fn ($adCampaign, $i) => (
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
    public function canCreateNewAdvertCampaign()
    {
        // make a request to the endpoint for storing
        // $response =
        // ensure that there is a record in the database with the specified name of the inserted advert campaign
        // check the uploaded files
    }
}
