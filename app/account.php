<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $fillable = [
        'user',
        'passwd',
        'created',
        'expire',
        'user_id',
        'server_id',
        'status'
    ];
}
