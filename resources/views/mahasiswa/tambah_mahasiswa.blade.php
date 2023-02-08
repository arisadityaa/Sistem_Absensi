@extends('layouts.master')

@section('content')
    <div class="container text-center">
        <h1>Tambah Mahasiswa</h1>
    </div>

    <div class="container">
        <form action="/mahasiswa/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">User Id</label>
                <input type="text" class="form-control" value="{{ $user->id }}" name="user_id" id="user_id"
                    readonly="readonly">
            </div>
            <div class="form-group">
                <label for="nim">NIM Mahasiswa</label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim"
                    value="{{ old('nim') }}" placeholder="Masukkan NIM Mahasiswa">
                @error('nim')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama Mahasiswa</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
                    value="{{ old('nama') }}" placeholder="Masukkan Nama Mahasiswa">
                @error('nama')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan Mahasiswa</label>
                <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan">
                    @if (!old('jurusan'))
                        <option selected="selected" disabled="disabled">Masukkan Jurusan</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->jurusan }}</option>
                        @endforeach
                    @else
                        @foreach ($majors as $major)
                            <option {{(old('jurusan') == $major->id) ? 'selected="selected"' : ""}} value="{{ $major->id }}">{{ $major->jurusan }}</option>
                        @endforeach
                    @endif
                </select>
                @error('jurusan')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <select class="form-control @error('semester') is-invalid @enderror" name="semester" id="semester">

                    @if (!old('semester'))
                        <option selected="true" disabled="disabled">Masukkan Semester</option>
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i }}">Semester {{ $i }}</option>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i }}" {{(old('semester') == $i) ? 'selected="selected"' : ""}}>Semester {{ $i }}</option>
                        @endfor
                    @endif

                </select>
                @error('semester')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                    id="tanggal_masuk" value="{{ date('Y-m-d') }}">
            </div>
            <button class="btn btn-success" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
            <a href="/mahasiswa" class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
        </form>
    </div>
@endsection
