@extends('layouts.master')

@section('content')
<div class="container my-4 text-center">
    <h1>Edit Mahasiswa</h1>
</div>

<div class="container">
    <form action="/mahasiswa/update/{{$student->id}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nim">NIM Mahasiswa</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{$student->nim}}" id="nim">
            @error('nim')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{$student->nama}}">
            @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan Mahasiswa</label>
            <select class="form-control @error('jurusan') is-invalid @enderror" value="{{$student->jurusan}}" name="jurusan" id="jurusan">
                @foreach ($majors as $major)
                <option value="{{$major->id}}" @if($major->id == $student->major_id) selected="select" @endif>
                {{$major->jurusan}}</option>
                @endforeach
            </select>
            @error('jurusan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="semester">Semester</label>
            <select class="form-control @error('semester') is-invalid @enderror" name="semester" id="semester">
                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}" @if($i == $student->semester) selected="select" @endif>Semester {{ $i }}</option>
                @endfor
            </select>
            @error('semester')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <div class="form-group">
            <label for="tanggal_masuk">Tanggal Masuk</label>
            <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" id="tanggal_masuk" value="{{$student->tanggal_masuk}}">
            @error('tanggal_masuk')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
        </div>
        <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
        <a href="/mahasiswa" class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
    </form>
</div>
@endsection