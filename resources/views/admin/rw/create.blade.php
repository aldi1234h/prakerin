@extends('layouts.master')
@section('konten')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Tambah Data RW
                    </div>
                    <div class="card-body">
                        <form action="{{route('rw.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Pilih Desa</label>
                                <select name="id_desa" class="form-control">
                                    @foreach($desa as $data)
                                    <option value="{{$data->id}}">{{$data->nama_desa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="">RW</label>
                                <input type="text" name="nama_rw" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn block">Simpan</button>
                                <a href=" {{ route('rw.index') }} " class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection