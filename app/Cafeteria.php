<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cafeteria extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany('App\Menu');
    }
}
