<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;
use App\Models\Kasus;



class ApiController extends Controller
{
    public function Indonesia(){
        $reaktif = DB::table('kasuses')
                        ->select('kasuses.reaktif')
                        ->sum('kasuses.reaktif');

        $positif = DB::table('kasuses')
                        ->select('kasuses.positif')
                        ->sum('kasuses.positif');

        $sembuh = DB::table('kasuses')
                        ->select('kasuses.sembuh')
                        ->sum('kasuses.sembuh');

        $meninggal = DB::table('kasuses')
                        ->select('kasuses.meninggal')
                        ->sum('kasuses.meninggal');

        return response([
                    'success' => true,
                    'data' => [
                    'name' => 'Indonesia',
                    'reaktif'=> $reaktif,
                    'positif'=> $positif,
                    'sembuh'=> $sembuh,
                    'meninggal'=> $meninggal,
                            ],
                                    'message' => ' Berhasil!',

                        ]);

    }
    public function provinsi(){
        $provinsi = DB::table('provinsis')
        ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(kasuses.reaktif) as reaktif'),
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.id_provinsi')
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('provinsis.id','tanggal')
        ->get();
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $provinsi,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
        ]);

    }

    public function pw($id){

        $provinsi = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
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
        return response([
            'success' => true,
            'data' => $provinsi,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',

        ]);
    }

    public function rw(){
        $provinsi = DB::table('kasuses')->select('provinsis.nama_provinsi')->
        join('provinsis','kasuses.id','=','provinsis.id')->get('kasuses.nama_provisi');
        $rw =DB::table('kasuses')->select([
                 DB::raw('SUM(reaktif) as Reaktif'),
                DB::raw('SUM(positif) as Positif'),
                DB::raw('SUM(sembuh) as Sembuh'),
                DB::raw('SUM(meninggal) as Meninggal'),
        ])->groupBy('tanggal')->get();
        $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
        $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
        $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
        $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
            return response([
                'success' => true,
                'data' => [
                            'Hari Ini' => $rw,
                'Total' =>[ 'Jumlah Reaktif' => $reaktif,
                            'Jumlah Positif' => $positif,
                            'Jumlah Sembuh' => $sembuh,
                            'Jumlah Meninggal' => $meninggal,
                        ],
                        'message' => ' Berhasil!',
                    ],
            ]);
    }
    public function reaktif(){
        $reaktif = DB::table('kasuses')->select('kasuses.reaktif')->sum('kasuses.reaktif');
        return response([
            'success' => true,
            'data' => [
                'name' => 'Total Reaktif',
                'value'=> $reaktif,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function positif(){
        $positif = DB::table('kasuses')->select('kasuses.positif')->sum('kasuses.positif');
        return response([
            'success' => true,
            'data' => [
                'name' => 'Total Positif',
                'value' => $positif,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function sembuh(){
        $sembuh = DB::table('kasuses')->select('kasuses.sembuh')->sum('kasuses.sembuh');
        return response([
            'success' => true,
            'data' => [
                        'name' => 'Total Sembuh',
                        'value' => $sembuh,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
    public function meninggal(){
        $meninggal = DB::table('kasuses')->select('kasuses.meninggal')->sum('kasuses.meninggal');
        return response([
            'success' => true,
            'data' => [
                        'name' => 'Total Meninggal',
                        'value' => $meninggal,
            ],
                    'message' => ' Berhasil!',

        ]);
    }
}