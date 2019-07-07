<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deal_id', 'category', 'days', 'hours', 'minutes', 'status','bids',
    ];
    
}
