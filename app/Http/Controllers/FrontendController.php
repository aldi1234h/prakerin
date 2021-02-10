<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $provinsi = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('provinsis.id')
        ->get();
        return view('frontend.index',compact('provinsi'));
    }
    public function Indonesia(){
        $pos = DB::table('kasuses')
                        ->sum('kasuses.positif');

        $sem = DB::table('kasuses')
                        ->sum('kasuses.sembuh');

        $men = DB::table('kasuses')
                        ->sum('kasuses.meninggal');
        return view('frontend.index',compact('pos,sem,men'));            
    }
        
}