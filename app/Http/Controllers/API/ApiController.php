<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;
use App\Models\Kasus;
use Carbon\Carbon;



class ApiController extends Controller
{
    public $data = [];
    public function global(){
        $response = Http::get('https://api.kawalcorona.com/')->json();
        //dd(response);
        foreach($response as $data => $val){
            $raw = $val['attributes'];
            $res = [
                'Negara' => $raw['Country_Region'],
                'Positif' => $raw['Confirmed'],
                'Sembuh' => $raw['Recovered'],
                'Meninggal' => $raw['Deaths']
            ];
            array_push($this->data, $res);
        }
        $data=[
            'success' => true,
            'data' => $this->data,
            'message' => 'Berhasil'
        ];
        return response()->json($data,200);
    }
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
                                    'message' => ' Berhasil!'

                        ]);

    }
    public function provinsi(){
        $allDay = DB::table('provinsis')
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
        ->groupBy('provinsis.id')
        ->get();

        $toDay = DB::table('provinsis')
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
        ->whereDate('kasuses.tanggal',Carbon::Today())
        ->groupBy('provinsis.id')
        ->get();
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'
                ],
        ]);

    }

    public function provinsishow($id){

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
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'

        ]);
    }

    public function kota(){
        $allDay = DB::table('kotas')
        ->select('kotas.nama_kota',
        DB::raw('SUM(kasuses.reaktif) as reaktif'),
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('kotas.id')
        ->get();
        $toDay = DB::table('kotas')
        ->select('kotas.nama_kota',
        DB::raw('SUM(kasuses.reaktif) as reaktif'),
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->whereDate('kasuses.tanggal',Carbon::Today())
        ->groupBy('kotas.id')
        ->get();
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'
                ],
        ]);

    }
    public function kotashow($id){

        $kota = DB::table('kotas') ->select('kotas.nama_kota',
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('kotas.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => $kota,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'

        ]);
    }

    public function kecamatan(){
        $allDay = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(kasuses.reaktif) as reaktif'),
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('kecamatans.id')
        ->get();
        $toDay = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(kasuses.reaktif) as reaktif'),
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->whereDate('kasuses.tanggal',Carbon::Today())
        ->groupBy('kecamatans.id')
        ->get();
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'
                ],
        ]);

    }
    public function kecamatanshow($id){

        $kecamatan = DB::table('kecamatans') ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('desas','kecamatans.id','=','desas.id_kecamatan')
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('kecamatans.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => $kecamatan,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'

        ]);
    }

    public function desa()
    {
        $allDay = DB::table('desas')
          ->select('desas.nama_desa',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
          ->groupBy('desas.id')->get();

          $toDay = DB::table('desas')
          ->select('desas.nama_desa',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('desas.id')->get();
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($desa);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay
                        ],
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'
        ]);

    }
    public function desashow($id){

        $desa = DB::table('desas') ->select('desas.nama_desas',
        DB::raw('SUM(kasuses.positif) as positif'),
        DB::raw('SUM(kasuses.sembuh) as sembuh'),
        DB::raw('SUM(kasuses.meninggal) as meninggal'))
        ->join('rws','desas.id','=','rws.id_desa')
        ->join('kasuses','rws.id','=','kasuses.id_rw')
        ->groupBy('desas.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('kasuses.positif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.reaktif')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.sembuh')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => $desa,
            'Total' =>[
                        'Jumlah Reaktif' => $reaktif,
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal
                    ],
                    'message' => ' Berhasil!'

        ]);
    }

    public function rw()
    {
        $allDay = DB::table('rws')
          ->select('rws.nama_rw',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kasuses','rws.id','=','kasuses.id_rw')
          ->groupBy('rws.id')->get();

          $toDay = DB::table('rws')
          ->select('rws.nama_rw',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('rws.id')->get();
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($rw);
            return response([
                'success' => true,
                'data' => [
                            'Hari Ini' => $toDay,
                            'Semua' => $allDay,
                'Total' =>[ 'Jumlah Reaktif' => $reaktif,
                            'Jumlah Positif' => $positif,
                            'Jumlah Sembuh' => $sembuh,
                            'Jumlah Meninggal' => $meninggal
                        ],
                        'message' => ' Berhasil!'
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