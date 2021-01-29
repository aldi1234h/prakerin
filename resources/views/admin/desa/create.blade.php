@extends('layouts.master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambdah Data Desa</div>

                <div class="card-body">
                    <form action=" {{ route('desa.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            
                            <div class="form-group">
                                <label for="">Masukkan Nama Desa</label>
                                <input type="text" class="form-control" name="nama_desa" required>
                                @if ($errors->has('nama_desa'))
                                <span class="text-danger">{{ $errors->first('nama_desa') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Kecamatan</label>
                                <select class="form-control"  name="id_kecamatan" id="">
                                    @foreach ($kecamatan as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama_kecamatan}} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <button class="btn btn-primary"  type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection