<?php

namespace App\Http\Controllers;

use App\Major;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function show()
    {
        $title = 'List Mahasiswa';
        $students = Student::paginate(4);
        $item = Student::where('user_id', auth()->user()->id)->first();
        return view('mahasiswa.list_mahasiswa', compact('students', 'item', 'title'));
    }

    public function add(){
        $title = 'Tambah data Mahasiswa';
        $majors = Major::all();
        $user = User::find(auth()->user()->id);
        return view('mahasiswa.tambah_mahasiswa', ['majors'=>$majors, 'user'=>$user, 'title'=>$title]);
    }

    public function store(Request $request){
        $validate = $request->validate(
            [
                'nim' => 'required|numeric|unique:students',
                'nama' => 'required',
                'jurusan' => 'required',
                'semester' => 'required',
                'tanggal_masuk' => 'required'
            ]
            );
        $validate = new Student;
        $validate->user_id = $request->user_id;
        $validate->major_id = $request->jurusan;
        $validate->nim = $request->nim;
        $validate->nama = $request->nama;
        $validate->semester = $request->semester;
        $validate->tanggal_masuk = $request->tanggal_masuk;
        $validate->save();
        return redirect('/mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $title = 'Edit Mahasiswa';
        $student = Student::find($id);
        $majors = Major::all();
        return view('mahasiswa.edit_mahasiswa', [
            'student'=>$student,
            'majors'=>$majors,
            'title'=>$title
        ]);
    }

    public function update($id, Request $request){
        $validate = $request->validate(
            [
                'nim' => 'required|numeric',
                'nama' => 'required',
                'jurusan' => 'required',
                'semester' => 'required',
                'tanggal_masuk' => 'required'
            ]
            );
        $validate = Student::find($id);
        $validate->major_id = $request->jurusan;
        $validate->nim = $request->nim;
        $validate->nama = $request->nama;
        $validate->semester = $request->semester;
        $validate->tanggal_masuk = $request->tanggal_masuk;
        $validate->save();
        return redirect('/mahasiswa')->with('info', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return back()->with('danger', 'Data Berhasil Dihapus');;
    }
}
