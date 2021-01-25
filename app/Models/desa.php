<?php

namespace App\Models;
use App\Models\kecamatan;
use App\Models\rw;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    public function kecamatan()
    {
        return $this->belongsto('App\Models\kecamatan','id_kecamatan');
    }
    public function rw()
    {
        return $this->hasMany('App\Models\rw','id_desa');
    }
    use HasFactory;
}
