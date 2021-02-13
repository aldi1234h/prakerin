<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $positif = DB::table('rws')
        ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal',)
        ->join('kasuses','rws.id','kasuses.id_rw')
        ->sum('kasuses.positif');
        $sembuh = DB::table('rws')
        ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal',)
        ->join('kasuses','rws.id','kasuses.id_rw')
        ->sum('kasuses.sembuh');
        $meninggal = DB::table('rws')
        ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal',)
        ->join('kasuses','rws.id','kasuses.id_rw')
        ->sum('kasuses.meninggal');
        $global = file_get_contents('https://api.kawalcorona.com/positif/');
        $posglobal = json_decode($global,TRUE);

        $tanggal = Carbon::now()->format('D d-M-Y h;i;s');



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

        $datadunia = file_get_contents('https://kawalcorona.com');
        $dunia = json_decode($datadunia, TRUE);

        return view('frontend.index',compact('provinsi', 'positif', 'sembuh', 'meninggal', 'dunia'));
    }
    
        
}