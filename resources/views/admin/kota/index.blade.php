@extends('layouts.master')
@section('konten')
    @include('flash-message')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Data Kota</b>
                        <a href="{{ route('kota.create') }}" class="btn btn-primary float-right">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kota</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Aksi</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($kota as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->kode_kota }}</td>
                                        <td>{{ $data->nama_kota }}</td>
                                        <td>{{ $data->provinsi->nama_provinsi }}</td>
                                        <td>
                                            <center>
                                                <form action="{{ route('kota.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('Delete')
                                                    <a class="btn btn-outline-success btn-sm"
                                                        href=" {{ route('kota.show', $data->id) }} "><i
                                                            class="fa fa-eye"></a></i>

                                                    </a>
                                                    <a class="btn btn-outline-info btn-sm"
                                                        href=" {{ route('kota.edit', $data->id) }} "><i
                                                            class="fa fa-edit"></a></i>

                                                    </a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                            class="fa fa-trash-alt"></a></i></button>
                                                </form>

                                            </center>
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
