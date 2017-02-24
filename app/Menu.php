<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];

    public function cafeteria()
    {
        return $this->belongsTo('App\Cafeteria');
    }
}
