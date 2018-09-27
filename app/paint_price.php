<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paint_price extends Model
{
    protected $guarded = [];

    public function paint() {
        return $this->belongsTo('App\painting', 'id_paint');
    }

    public function plume() {
        return $this->belongsTo('App\plume', 'id_plume');
    }

    public function size() {
        return $this->belongsTo('App\size', 'id_size');
    }
}
