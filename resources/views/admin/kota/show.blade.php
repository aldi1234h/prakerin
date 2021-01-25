@extends('layouts.master')
@seaction('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show data Kota
                </div>
                <div class="card-body">
                    <form action="{{route('provinsi.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" value="{{$kota->kode_kota}}" redonly name="kode_kota">
                        </div>
                        <div class="form-group">
                            <label for="">nama Kota</label>
                            <input type="text" value="{{$kota->nama_kota}}" redonly name="nama_kota">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>