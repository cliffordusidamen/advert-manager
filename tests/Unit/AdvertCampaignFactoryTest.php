<?php

namespace Tests\Unit;

use App\Models\User;
use Domain\AdvertCampaigns\Models\AdvertCampaign;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AdvertCampaignFactoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic unit test example.
     * 
     *  @test
     * @return void
     */
    public function canCreateAdvertCampaign()
    {
        $user = User::factory()->create();
        AdvertCampaign::factory()
            ->for($user)
            ->count(4)
            ->create();

        $this->assertEquals(4, $user->advertCampaigns()->count());
    }
}
