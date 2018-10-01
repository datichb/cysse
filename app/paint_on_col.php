<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paint_on_col extends Model
{
    protected $guarded = [];

    public function paint() {
        return $this->belongsTo('App\painting', 'id_paint', 'id');
    }

    public function collection() {
        return $this->belongsTo('App\collection', 'id_col', 'id');
    }
}
