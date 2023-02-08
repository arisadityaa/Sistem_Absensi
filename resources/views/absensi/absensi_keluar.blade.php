@extends('layouts.master')

@section('content')

<div class="container my-4">
    <h1>Absen Keluar</h1>
</div>

    <div class="container mt-4 py-4 ">
        <div class="row">
            <div class="col-8">
                <div class="bg-info rounded">
                    <form action="/absensi/absen_keluar/{{$presence->id}}" method="POST" class="px-4 py-4">
                        @csrf
                        <fieldset disabled="disabled">
                            <div class="form-group row">
                                <label for="nim" class="col-md-3 col-form-label col-form-label-md">NIM Mahasiswa</label>
                                <input type="text" class="form-control form-control-md col-md-9" name="nim"id="nim" value= "{{$presence->student->nim}}">
                            </div>
                        </fieldset>
                        
                        <fieldset disabled>
                            <div class="form-group row">
                                <label for="nama" class="col-md-3 col-form-label col-form-label-md">Nama Mahasiswa</label>
                                <input type="text" id="nama" class="form-control form-control-md col-md-9"
                                    value="{{$presence->student->nama}}">
                            </div>
                        </fieldset>

                        <fieldset disabled>
                            <div class="form-group row">
                                <label for="jurusan" class="col-md-3 col-form-label col-form-label-md">Jurusan</label>
                                <input type="text" id="jurusan" class="form-control form-control-md col-md-9"
                                    value="{{$presence->student->major->jurusan}}">
                            </div>
                        </fieldset>

                        <fieldset disabled="disabled">
                            <div class="form-group row">
                                <label for="kegiatan" class="col-md-3 col-form-label col-form-label-m">Kegiatan</label>
                                <input type="text" class="form-control form-control-md col-md-9" name="kegiatan"
                                    id="kegiatan" value="{{ $presence->kegiatan}}">
                            </div>
                        </fieldset>

                        <fieldset disabled="disabled">
                            <div class="form-group row">
                                <label for="jam_masuk" class="col-md-3 col-form-label col-form-label-m">Jam Masuk</label>
                                <input type="time" class="form-control form-control-md col-md-9" name="jam_masuk"
                                    id="jam_masuk" value="{{ $presence->jam_masuk}}">
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <label for="jam_keluar" class="col-md-3 col-form-label col-form-label-m">Jam Keluar</label>
                            <input type="time" class="form-control form-control-md col-md-9" name="jam_keluar"
                                id="jam_keluar" value="{{date('H:i:s')}}">
                        </div>
                        
                        <button class="btn btn-success" type="submit"><i class="fa fa-refresh" aria-hidden="true"></i> Update Absensi</button>
                        <a href="{{ URL::previous() }}" class="btn btn-warning mx-2"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
