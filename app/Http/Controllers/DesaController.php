<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kecamatan;

class DesaController extends Controller
{
    
    public function index()
    {
        $desa = Desa::all();
        $kecamatan = Kecamatan::all();
        return view('admin.desa.index', \compact('desa'));
    }

    
    public function create()
    {
        $desa = Desa::all();
        $kecamatan = Kecamatan::all();
        return view('admin.desa.create', \compact('desa', 'kecamatan'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|unique:desas|max:255',
           
        ]);

        $desa = new Desa;
        $desa->nama_desa = $request->nama_desa;
        $desa->id_kecamatan = $request->id_kecamatan;
        $desa->save();
        return redirect()->route('desa.index')->with(['success' => 'Data berhasil di input!']);
    }

   
    public function show($id)
    {
        $desa = Desa::findOrFail($id);
        $kecamatan=Kecamatan::all();
        return view ('admin.desa.show' , compact('desa' , 'kecamatan'));
    }

    
    public function edit($id)
    {
        $desa = Desa::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.desa.edit', compact('desa', 'kecamatan'));
    }

   
    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);
        $desa->nama_desa = $request->nama_desa;
        $desa->id_kecamatan = $request->id_kecamatan;
        $desa->save();
        return redirect()->route('desa.index')->with(['info' => 'Data berhasil di edit!']);
    }

   
    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();
        return redirect()->route('desa.index')->with(['error' => 'Data berhasil di hapus!']);
    }
}