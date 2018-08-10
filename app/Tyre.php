<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    public function tyre()
    {
        return $this->belongsTo('App\MedTyre');
    }
}
