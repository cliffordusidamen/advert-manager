<?php

namespace Domain\AdvertCampaigns\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertCampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "date_from" =>$this->date_from,
            "date_to" =>$this->date_to,
            "daily_budget" => (double) $this->daily_budget,
            "total_budget" => (double) $this->total_budget,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
