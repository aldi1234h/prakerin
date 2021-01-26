<?php

namespace App\Http\Controllers;

use App\Models\desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::with('kecamatan')->get();
        return view('admin.desa.index', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desa = Desa::all();
        return view('admin.desa.create', compact('desa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $desa = new Desa();
        $desa->id_kecamatan = $request->id_kecamatan;
        $desa->nama_desa = $request->nama_desa;
        $desa->save();
        return redirect()->route('desa.index')
            ->with(['success'=>'Data <b>', $desa->nama_desa, 
            '</b> Berhasil di input']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desa = Desa::findOrFail($id);
        return view('admin.desa.show', compact('desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $desa = Desa::findOrFail($id);
        return view('admin.desa.edit', compact('desa', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);
        $desa->id_kecamatan = $request->id_kecamatan;
        $desan->kode_desa = $request->kode_desa;
        $desa->nama_desa = $request->nama_desa;
        $desa->save();
        return redirect()->route('desa.index')
            ->with(['success'=>'Data <b>', $desa->nama_desa, 
            '</b> Berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('desa.index')
            ->with(['success'=>'Data <b>', $desa->nama_desa, 
            '</b> Berhasil di hapus']);
    }
}
