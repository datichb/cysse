<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paint_price extends Model
{
    protected $guarded = [];

    public function paint() {
        return $this->belongsTo('App\painting', 'id');
    }

    public function plume() {
        return $this->hasOne('App\plume', 'id');
    }

    public function size() {
        return $this->hasOne('App\size', 'id');
    }
}
