<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cafeterias()
    {
        return $this->hasMany('App\Cafeteria');
    }

}
