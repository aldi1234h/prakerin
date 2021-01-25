<?php

namespace App\Models;
use App\Models\kota;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    public function kota()
    {
        return $this->hasMany('App\Models\kota','id_provinsi');
    }
    use HasFactory;
}
