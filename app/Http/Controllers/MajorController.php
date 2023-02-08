<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    //
    public function show(Request $request)
    {

        $majors = Major::paginate(5);
        if ($request->path() == 'jurusan') {
            $title = 'List Jurusan';
            return view('jurusan.list_jurusan', compact('majors', 'title'));
        } else if ($request->path() == 'jurusan/tambah') {
            $title = 'Tambah Jurusan';
            return view('jurusan.tambah_jurusan', compact('title'));
        }
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'jurusan' => 'required|unique:majors'
            ]
        );
        $validate = new Major;
        $validate->jurusan = $request->jurusan;
        $validate->save();
        return redirect('/jurusan')->with('success', 'Data Jurusan Berhasil Ditambahkan!');
    }
    public function update($id, Request $request)
    {
        $validate = $request->validate(
            [
                'jurusan' => 'required'
            ]
        );
        $validate = Major::find($id);
        $validate->jurusan = $request->jurusan;
        $validate->save();
        return redirect('/jurusan')->with('warning', 'Data Jurusan Berhasil Diubah!');;
    }

    public function edit($id)
    {
        $title = 'Edit Jurusan';
        $major = Major::find($id);
        return view('jurusan.edit_jurusan', compact('major', 'title'));
    }

    public function destroy($id)
    {
        $major = Major::find($id);
        $major->delete();
        return back()->with('danger', 'Data Jurusan Berhasil Dihapus!');
    }
}
