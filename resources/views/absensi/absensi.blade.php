@extends('layouts.master')

@section('content')

    <div class="container my-2 text-center">
        <h1>Absensi Mahasiswa</h1>
    </div>

    <div class="container mb-4">
        <a class="btn btn-info" href="/absensi/tambah" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Absensi Mahasiswa</a>
    </div>

    <div class="container">
        @if ($presences->count())
            <table class="table table-bordered">
                <thead class="bg-info text-center">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Kegiatan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($presences as $presence)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $presence->student->nim }}</td>
                            <td>{{ $presence->student->nama }}</td>
                            <td>{{ $presence->student->major->jurusan }}</td>
                            <td>{{ $presence->kegiatan }}</td>
                            <td>{{ $presence->jam_masuk }}</td>
                            <td>
                                @if ($presence->jam_keluar)
                                    {{ $presence->jam_keluar }}
                                @else
                                    Belum Keluar
                                @endif
                            </td>
                            <td class="text-center">
                                @if (!$presence->jam_keluar)
                                    <a class="btn btn-info" href="/absensi/absen_masuk/edit/{{ $presence->id }}"
                                        role="button"><i class="fa fa-share" aria-hidden="true"></i> Update Jam Keluar</a>
                                @else
                                    Absensi Selesai
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @else
        <div class="alert alert-info" role="alert">
            No Data Exist
          </div>
        @endif
    </div>
@endsection
