@extends('layouts.master')

@section('content')
    @isset($item)
        <div class="container col-5 my-4">
            <div class="card">
                <div class="card-header bg-info text-center text-light"><h5>Data Mahasiswa</h5></div>
                <div class="card-body">
                    <h4 class="text-info">{{ $item->nama }}</h4>
                    <p>
                        NIM : {{ $item->nim }}<br>
                        Jurusan : {{ $item->major->jurusan }} <br>
                        Semester : {{ $item->semester }} <br>
                        Tanggal Masuk : {{ $item->tanggal_masuk }}
                    </p>
                </div>

            </div>
        </div>
    @else
        <div class="container col-5 my-4">
            <div class="card">
                <div class="card-header bg-info text-center text-light"><h5>User {{auth()->user()->username}} belum mengisi data mahasiswa</h5></div>
                <div class="card-body text-center">
                    <a class="btn btn-info" href="mahasiswa/tambah" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Mahasiswa</a>
                </div>
            </div>
        </div>
    @endisset

    <div class="container mb-4">
        <h3 class="text-secondary">List Seluruh Mahasiswa</h3>
    </div>


    <div class="container mb-5">
        @if ($students->count())
            <table class="table table-bordered table-hover">
                <thead class="text-center text-light bg-info">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Semester</th>
                        <th>Tanggal Diterima</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="text-center">{{ $student->nim }}</td>
                            <td class="text-center">{{ $student->nama }}</td>
                            <td class="text-center">{{ $student->major->jurusan }}</td>
                            <td class="text-center">Semester {{ $student->semester }}</td>
                            <td class="text-center">{{ $student->tanggal_masuk }}</td>
                            <td class="text-center">
                                @if ($student == $item)
                                    <a class="btn btn-warning mb-2" href="/mahasiswa/edit/{{ $student->id }}"
                                        role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                        Mahasiswa</a>
                                    <a class="btn btn-danger mb-2" href="/mahasiswa/delete/{{ $student->id }}"
                                        role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                        Mahasiswa</a>
                                @else
                                    Valid
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        @else
            <div class="alert alert-info" role="alert">
                No Data Exist
            </div>
        @endif

    </div>
@endsection
