@extends('layouts.master')

@section('content')

    <div class="container text-center my-4">
        <h1>List Jurusan</h1>
    </div>

    <div class="container my-2">
        <a class="btn btn-info" href="/jurusan/tambah" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Jurusan</a>
    </div>

    <div class="container">
        @if ($majors->count())
            <table class="table table-bordered table-hover">
                <thead class="bg-info text-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Jurusan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($majors as $major)
                        <tr>
                            <td class="text-center">{{ $majors->firstItem() + $loop->index }}</td>
                            <td class="text-center">{{ $major->jurusan }}</td>
                            <td class="text-center">
                                <a class="btn btn-warning" href="/jurusan/edit/{{ $major->id }}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    Jurusan</a>
                                <a class="btn btn-danger" href="/jurusan/delete/{{ $major->id }}" role="button"><i class="fa fa-trash" aria-hidden="true"></i> Hapus
                                    Jurusan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $majors->links() }}
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No Data Exist
            </div>
        @endif

    </div>

@endsection
