<?php

namespace Domain\AdvertCampaigns\Models;

use App\Models\User;
use Domain\AdvertCampaigns\Collections\AdvertCampaignCollection;
use Domain\AdvertCampaigns\Factories\AdvertCampaignFactory;
use Domain\AdvertCampaigns\QueryBuilders\AdvertCampaignQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdvertCampaign extends Model
{
    use HasFactory;

    /**
     * List of guarded fields
     * 
     * @var array
     */
    protected $guarded = [];

    /**
     * Fields to be casted as dates
     * 
     * @var array
     */
    protected $dates = [
        'date_from',
        'date_to',
        'created_at',
        'updated_at',
    ];

    /**
     * Initialize query builder for the AdvertCampaign model
     * 
     * @return \Domain\AdvertCampaigns\QueryBuilders\AdvertCampaignQueryBuilder
     */
    public function newEloquentBuilder($query)
    {
        return new AdvertCampaignQueryBuilder($query);
    }

    /**
     * Prepare collection of AdvertManager records
     * 
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new AdvertCampaignCollection($models);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        $factory = AdvertCampaignFactory::class;

        return $factory::new();
    }

    /**
     * Belongs to a user
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
