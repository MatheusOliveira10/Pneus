<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedTyre extends Model
{
    public function MedTyres()
    {
        return $this->hasMany('App\Tyre');
    }
}
