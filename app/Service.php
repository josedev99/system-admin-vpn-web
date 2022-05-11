<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'protocol','country','flag'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    

}
