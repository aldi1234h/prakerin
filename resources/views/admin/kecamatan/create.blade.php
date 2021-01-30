@extends('layouts.master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <form action=" {{ route('kecamatan.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                            
                            <div class="form-group">
                                <label for="">Masukkan Nama Kecamatan</label>
                                <input type="text" class="form-control" name="nama_kecamatan" required>
                                @if ($errors->has('nama_kecamatan'))
                                <span class="text-danger">{{ $errors->first('nama_kecamatan') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="">Kota</label>
                                <select class="form-control"  name="id_kota" id="">
                                    @foreach ($kota as $item)
                                        <option value=" {{$item->id}} "> {{$item->nama_kota}} </option>
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