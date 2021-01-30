@extends('layouts.master')
@section('konten')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('kasus.update',$kasus->id)}}"  method="POST">
                @csrf
                @method('PUT')
                @livewireScripts
                @livewire('livewire',['selectedRw' => $kasus->id_rw,'idt' => $kasus->id])
                @livewireStyles
                <div class="form-group">
                <button type="submit" class="btn btn-info">Edit</button>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection