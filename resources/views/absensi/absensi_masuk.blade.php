@extends('layouts.master')

@section('content')
    <div class="container my-4">
        <h1>Buat Absen Baru</h1>
    </div>
    <div class="container mt-4 py-4 ">
        <div class="row">
            <div class="col-8">
                <div class="bg-info rounded">
                    <form action="/absensi/absen_masuk" method="POST" class="px-4 py-4">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student_id" id="id">
                        <div class="form-group row">
                            <label for="id" class="col-md-3">Nama Mahasiswa</label>
                            <input type="text" class="form-control col-md-9" value="{{$student->nama}}" readonly id="id">
                        </div>
                            <div class="form-group row">
                                <label for="kegiatan" class="col-md-3 col-form-label col-form-label-md">Kegiatan</label>
                                    <select class="form-control col-md-9" name="kegiatan" id="kegiatan" >
                                        <option disabled="disabled" selected="selected">Masukkan Jenis Kegiatan</option>
                                        @foreach ($activities as $activity)
                                        <option value="{{ $activity }}">{{ $activity }}</option>
                                        @endforeach
                                    </select>
                            </div>

                        <div class="form-group row">
                            <label for="jam_masuk" class="col-md-3 col-form-label col-form-label-m">Jam Masuk</label>
                            <input type="time" class="form-control form-control-md col-md-9" name="jam_masuk"
                                id="jam_masuk" value="{{date('H:i:s')}}">
                        </div>
                        
                        <button class="btn btn-primary mx-2" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Buat Absensi</button>
                        <a href="{{ URL::previous() }}" class="btn btn-warning mx-2"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
