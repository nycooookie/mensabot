<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    protected $dates = ['date'];

    public function cafeteria()
    {
        return $this->belongsTo('App\Cafeteria');
    }

}
