@extends('layouts.master')
@seaction('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show data Provinsi
                </div>
                <div class="card-body">
                    <form action="{{route('provinsi.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="text" value="{{$provinsi->kode_provinsi}}" redonly name="kode_provinsi">
                        </div>
                        <div class="form-group">
                            <label for="">nama Provinsi</label>
                            <input type="text" value="{{$provinsi->nama_provinsi}}" redonly name="nama_provinsi">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>