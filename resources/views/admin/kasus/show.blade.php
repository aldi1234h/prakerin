@extends('layouts.master')
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Show Data Kasus
                    </div>
                    <div class="card-body">
                            @csrf
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="">Nama Provinsi</label>
                                    <input type="text" name="nama_provinsi" value="{{$kasus->rw->desa->kecamatan->kota->provinsi->nama_provinsi}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Reaktif</label>
                                    <input type="text" name="reaktif" value="{{$kasus->reaktif}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="">Kota</label>
                                    <input type="text" name="nama_kota" value="{{$kasus->rw->desa->kecamatan->kota->nama_kota}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Positif</label>
                                    <input type="text" name="positif" value="{{$kasus->positif}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="">kecamatan</label>
                                    <input type="text" name="nama_kecamatan" value="{{$kasus->rw->desa->kecamatan->nama_kecamatan}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Sembuh</label>
                                    <input type="text" name="sembuh" value="{{$kasus->sembuh}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="">Desa</label>
                                    <input type="text" name="nama_desa" value="{{$kasus->rw->desa->nama_desa}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Meninggal</label>
                                    <input type="text" name="meninggal" value="{{$kasus->meninggal}}" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <label for="">No rw</label>
                                    <input type="text" name="nama_rw" value="{{$kasus->rw->nama_rw}}" class="form-control" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="">tanggal</label>
                                    <input type="date" name="tanggal" value="{{$kasus->tanggal}}" class="form-control" readonly>
                                 </div>
                            </div>
                            <div class="form-group">
                                <a href=" {{ route('kasus.index') }} " class="btn btn-danger">Back</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection