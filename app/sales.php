<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $fillable = [
        'user_id','total','date','paypal_data','account_id'
    ];
}
