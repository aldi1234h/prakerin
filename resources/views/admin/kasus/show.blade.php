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
                            <div class="form-group">
                                <label for="">Positif</label>
                                <input type="text" name="positif" value="{{$kasus->positif}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Sembuh</label>
                                <input type="text" name="sembuh" value="{{$kasus->sembuh}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">meninggal</label>
                                <input type="text" name="meninggal" value="{{$kasus->meninggal}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">tanggal</label>
                                <input type="date" name="tanggal" value="{{$kasus->tanggal}}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama rw</label>
                                <input type="text" name="nama_rw" value="{{$kasus->rw->nama_rw}}" class="form-control" readonly>
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