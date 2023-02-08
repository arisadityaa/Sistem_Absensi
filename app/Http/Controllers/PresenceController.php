<?php

namespace App\Http\Controllers;

use App\Presence;
use App\Student;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    //
    public function show(){
        $id = Student::select('id')->where('user_id', auth()->user()->id)->first();
        isset($id) ? $a = 'true' : $a = 'false';
        if(isset($id)){
            $presences = Presence::where('student_id', $id->id)->get();
            return view('absensi.absensi', compact('presences'));
        }else{
           return redirect('/mahasiswa')->with('warning', 'User Harus Mengisi Data Mahasiswa Terlebih Dahulu');
        }
        
        
    }

    public function add(){
        $activities=array('Perkuliahan Umum', 'Kegiatan Himpunan', 'Studi Literatur', 'Praktikum', 'Lainnya');
        $student = Student::where('user_id', auth()->user()->id)->first();
        return view('absensi.absensi_masuk', compact('student','activities'));
    }

    public function store(Request $request){
        $presence = new Presence;
        $presence->student_id = $request->student_id;
        $presence->jam_masuk = $request->jam_masuk;
        $presence->kegiatan = $request->kegiatan;
        $presence->save();
        return redirect('/absensi');
    }

    public function edit($id){
        $presence = Presence::find($id);
        return view('absensi.absensi_keluar', compact('presence'));
    }

    public function update($id, Request $request){
        $presence = Presence::find($id);
        $presence->jam_keluar = $request->jam_keluar;
        $presence->save();
        return redirect('/absensi');
    }
}
