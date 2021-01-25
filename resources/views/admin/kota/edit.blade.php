@extends('layouts.master')
@seaction('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit data Kota
                </div>
                <div class="card-body">
                    <form action="{{route('provinsi.update',$provinsi->$id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" value="{{$kota->kode_kota}}">
                        </div>
                        <div class="form-group">
                            <label for="">nama Kota</label>
                            <input type="text" name="nama_kota" value="{{$kota->nama_kota}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>