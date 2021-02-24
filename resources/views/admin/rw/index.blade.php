@extends('layouts.master')
@section('konten')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @include('flash-message')
                    <div class="card-header">
                        <b>Data Rw</b>
                        <a href="{{ route('rw.create') }}" class="btn btn-primary float-right">Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>RW</th>
                                    <th>Desa</th>
                                    <th>Aksi</th>
                                </tr>
                                @php $no=1; @endphp
                                @foreach ($rw as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_rw }}</td>
                                        <td>{{ $data->desa->nama_desa }}</td>
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
