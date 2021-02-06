<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;
use App\Models\Kasus;

class FrontController extends Controller
{
    public function frontProvinsi($id){

        $data = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('provinsis.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        
    }

     
}
