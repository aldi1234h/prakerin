@extends('layouts.master')

@section('konten')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Kasus') }}</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <form action="{{route('kasus.store')}}" class="form-horizontal m-t-30" method="post">
                            @csrf
                            @livewireScripts
                            @livewire('livewire')
                            @livewireStyles
                            <div class="form-group">
                            <button type="submit" class="float-right btn btn-outline-primary">Simpan</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection