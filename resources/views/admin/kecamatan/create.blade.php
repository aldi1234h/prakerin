@extends('layouts.master')
@seaction('konten')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tambah data Kota
                </div>
                <div class="card-body">
                    <form action="{{route('kota.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Pilih kota</label>

                            </div>
                            <div class="col-md-8">
                                <select name="id_provinsi" class="form-control">
                                    @foreach($kota as $data)
                                    <option value="{{$data->$id}}">{{$data->nama_kota}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kode kecamatan</label>
                            <input type="text" name="kode_kota" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama kecamatan</label>
                            <input type="text" name="nama_kota" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>