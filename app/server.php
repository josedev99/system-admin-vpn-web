<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class server extends Model
{
    protected $fillable = [
        'name',
        'payload',
        'ip',
        'country',
        'province',
        'days',
        'price',
        'type',
        'limit',
        'domain',
        'vps_user',
        'vps_passwd',
        'user_id',
        'service_id'
    ];
}
