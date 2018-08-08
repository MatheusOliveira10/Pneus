<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medpneus extends Model
{
    protected $table = 'medpneus';

    public function Medpneus()
    {
        return $this->hasMany('App\Tyre');
    }
}
