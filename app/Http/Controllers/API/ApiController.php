<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;
use App\Models\Kasus;


class ApiController extends Controller
{
    public function provinsi(){
        $provinsi = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('provinsis.id','tanggal')
        ->get();
        $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $provinsi
                        ],
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
        ]);
        // $data = [
        //     'status' => 200,
        //     'data' => $provinsi,
        //     'message' => 'Berhasil'
        // ];
        // return response()->json($data);
    }
    public function kota(){
        $kota = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('provinsis','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('provinsis.id','tanggal')
        ->get();
        $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($kota);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $kota
                        ],
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
        ]);
    }

}