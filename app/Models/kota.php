<?php

namespace App\Models;

use App\Models\provinsi;
use App\Models\kecamatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    public function provinsi()
    {
        return $this->belongsTo('App\Models\provinsi','id_provinsi');
    }
    public function kecamatan()
    {
        return $this->hasMany('App\Models\kecamtan','id_kota');
    }
    use HasFactory;
}
