<?php

namespace App\Models;
use App\Models\rw;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kasus extends Model
{
    public function rw()
    {
        return $this->belongsTo('App\Models\rw','id_rw');
    }
    
    use HasFactory;
}
