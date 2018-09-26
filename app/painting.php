<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class painting extends Model
{
    protected $guarded = [];

    public function price() {
        return $this->hasMany('App\paint_price', 'id_paint');
    }
}
