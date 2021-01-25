@extends('layouts.master')
@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Kota
                    <a href="{{route('kota.create')}}" class="btn btn-prymary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Kode Kecamatan</th>
                                <th>kecamatan</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($kecamatan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->kode_kecamatan}}</td>
                                <td>{{$data->nama_kecamatan}}</td>
                                <td>
                                <form action="{{route('provinsi.destroy,$data->$id')}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('provinsi.edit',$data->$id)}}" class="btn btn-succes">Edit</a>
                                    <a href="{{route('provinsi.show',$data->$id)}}" class="btn btn-warning">Show</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>    
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 