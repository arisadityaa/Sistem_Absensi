@extends('layouts.master')

@section('content')
@auth
<div class="container my-4">
    <h5>Welcome {{auth()->user()->username}}</h5>
</div>
@else
<div class="container my-4">
    <h5>Hello guest</h5>
</div>
@endauth



<div class="container my-5">
    <h1 class="text-center text-dark">Sistem Absensi Mahasiswa</h1>
</div>

<div class="container text-center">
    <a class="btn btn-info mx-2" href="/absensi"><i class="fa fa-id-card-o" aria-hidden="true"></i> Absen Mahasiswa</a>
    <a class="btn btn-info mx-2" href="/jurusan"><i class="fa fa-cogs" aria-hidden="true"></i> List Jurusan</a>
    <a class="btn btn-info mx-2" href="/mahasiswa"><i class="fa fa-users" aria-hidden="true"></i> List Mahasiswa</a>
</div>


@endsection