@extends('layouts.master')

@section('content')
    <div class="container mb-4 text-center">
        <h1>Edit Jurusan</h1>
    </div>
    <div class="container">
        <form action="/jurusan/update/{{$major->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="jurusan">Nama Jurusan</label>
                <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" value="{{$major->jurusan}}">
                @error('jurusan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
            <a href="/jurusan" class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
        </form>
    </div>
@endsection
