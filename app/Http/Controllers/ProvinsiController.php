<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = provinsi::all();
        return view('admin.provinsi.index',compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsi = new provinsi();
        $provinsi->kode_provinsi =$request->kode_provinsi;
        $provinsi->nama_provinsi =$request->nama_provinsi; 
        $provinsi->save();
        return redirect()->route('provinsi.index')
                ->with(['succes'=>'Data<b>',$provinsi->nama_provinsi,
                '</b> berhasil di input']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi= provinsi::findOrfail($id);
        return view('admin.provinsi.show',compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi= provinsi::findOrfail($id);
        return view('admin.provinsi.edit',compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $provinsi = provinsi::findOrfail($id);
        $provinsi->kode_provinsi =$request->kode_provinsi;
        $provinsi->nama_provinsi =$request->nama_provinsi; 
        $provinsi->save();
        return redirect()->route('provinsi.index')
                ->with(['succes'=>'Data<b>',$provinsi->nama_provinsi,
                '</b> berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = provinsi::findOrfail($id);
        $provinsi->delete();
        $provinsi->save();
        return redirect()->route('provinsi.index')
                ->with(['succes'=>'Data<b>',$provinsi->nama_provinsi,
                '</b> berhasil di hapus']);
    }
}
