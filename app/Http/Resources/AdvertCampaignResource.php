<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            "date_from" => Carbon::parse($this->date_from),
            "date_to" => Carbon::parse($this->date_to),
            "daily_budget" => (double) $this->daily_budget,
            "total_budget" => (double) $this->total_budget,
            "created_at" => Carbon::parse($this->created_at),
            "updated_at" => Carbon::parse($this->updated_at),
        ];
    }
}
