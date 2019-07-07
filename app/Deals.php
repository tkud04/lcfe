<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sku', 'type', 'category', 'status','rating', 'deadline'
    ];
    
}
