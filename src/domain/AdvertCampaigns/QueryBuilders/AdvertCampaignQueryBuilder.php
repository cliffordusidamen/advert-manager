<?php

namespace Domain\AdvertCampaigns\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class AdvertCampaignQueryBuilder extends Builder
{
    /**
     * Get only campaigns owned by a particular user
     * 
     * @param  int  $userId
     * @return Builder
     */
    public function byUserId(int $userId): Builder
    {
        return $this->where('user_id', $userId);
    }
}