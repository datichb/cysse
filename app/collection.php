<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collection extends Model
{
    protected $guarded = [];

    public function paint() {
        return $this->hasManyThrough('App\painting', 'App\paint_on_col', 'id_col', 'id', 'id_paint', 'id');
    }
}
