<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
