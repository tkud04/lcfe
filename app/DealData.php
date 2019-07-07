<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DealData extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sku', 'description', 'amount', 'in_stock', 'min_bid'
    ];
    
    #protected $table = 'deal_datas';
}
