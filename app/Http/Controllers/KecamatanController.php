<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        


        $kecamatan = Kecamatan::with('kota')->get();
        return view('admin.kecamatan.index',compact('kecamatan'));
    }

   
    public function create()
    {
        $kota=Kota::all();
        return view('admin.kecamatan.create', compact('kota'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans|max:255',
           
        ]);

        $kecamatan = new Kecamatan();
        $kecamatan->id_kota =$request->id_kota;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
        ->with(['success' => 'Data berhasil di input!']);
    }

   
    public function show( $id)
    {
        

        $kecamatan = Kecamatan::findOrFail($id);
        $kota=Kota::all();
        return view ('admin.kecamatan.show' , compact('kota' , 'kecamatan'));
    }

    
    public function edit( $id)
    {

        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('admin.kecamatan.edit', compact('kecamatan', 'kota'));
    
    }

    
    public function update(Request $request, $id)
    {
        $kecamatan = kecamatan::findOrFail($id);
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['info' => 'Data berhasil di edit!']);
    }

    
    public function destroy( $id)
    {
        $data = Kecamatan::findOrFail($id);
        $data->delete();
        return redirect()->route('kecamatan.index')->with(['error'=> 'Data berhasil di hapus!']);
    }
}