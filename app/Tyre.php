<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    public function medtyre()
    {
        return $this->belongsTo('App\MedTyre');
    }
}
