<?php

namespace Tests\Unit;

use App\Models\User;
use Domain\AdvertCampaigns\Factories\AdvertCampaignFactory;
use Domain\AdvertCampaigns\Models\AdvertCampaign;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdvertCampaignQueryBuilderTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic unit test example.
     *
     * @test
     * @return void
     */
    public function filtersByUserId()
    {
        $firstUser = User::factory()->create();
        $secondUser = User::factory()->create();
        AdvertCampaignFactory::new()
            ->for($firstUser)
            ->count(2)
            ->create();

        $firstUserCampaigns = AdvertCampaign::query()
            ->byUserId($firstUser->id)
            ->count();

        $secondAdvertCampaigns = AdvertCampaign::query()
            ->byUserId($secondUser->id)
            ->count();

        $this->assertEquals(0, $secondAdvertCampaigns);
        $this->assertEquals(2, $firstUserCampaigns);
    }
}
