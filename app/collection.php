<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collection extends Model
{
    protected $guarded = [];

    public function paint_on_col() {
        return $this->hasMany('App\paint_on_col', 'id_col', 'id');
    }
}
