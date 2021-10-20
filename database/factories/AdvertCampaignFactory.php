<?php

namespace Database\Factories;

use App\Models\AdvertCampaign;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertCampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvertCampaign::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dailyBudget = mt_rand(100, 999)/100;
        $totalBudget = mt_rand(10000, 99999)/100;
        $campaignDurationDays = mt_rand(10, 90);
        $campaignStartsInDays = mt_rand(1, 5);
        $dateFrom = Carbon::now()->add("{$campaignStartsInDays} days");

        return [
            'name' => $this->faker->sentence(),
            'daily_budget' => $dailyBudget,
            'total_budget' => $totalBudget,
            'date_from' => $dateFrom->format('Y-m-d'),
            'date_to' => $dateFrom->add("{$campaignDurationDays} days")->format('Y-m-d'),
        ];
    }
}
