<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\member;

class memberController extends Controller
{
    public function input() {
        return view('input_member');
    }

    public function kirim(Request $request) {
        $validatedData = $request->validate([
            'ktp'=>['required','min:3','unique:members'],
            'nama'=>'required',
            'alamat'=>'required',
            'umur'=>'required',
            'jenis_kelamin'=>'required',
            'sekolah/institusi'=>'required'
        ]);
        member::create($validatedData);
        return redirect('tampil_member')->with('status', 'Data Member Berhasil Diinput');
    }

    public function tampil(){
        $model = new member;
        $data=$model->all();
        return view('tampil_member',['data'=>$data]);
    }

    public function hapus($ktp){
        $model = member::find($ktp);
        $model->delete();
        return redirect('tampil_member')->with('status-deleted','Data Member Telah Dihapus');
    }

    public function edit($ktp){
        $model= member::find($ktp);
        return view('edit_member')->with('post',$model);
    }

    public function update(Request $request, $ktp){
        $model= member::find($ktp);
        $rules = [
            'nama'=>'required',
            'alamat'=>'required',
            'umur'=>'required',
            'jenis_kelamin'=>'required',
            'sekolah/instansi'=>'required'
        ];
        if ($request->ktp != $model->ktp) {
            $rules['ktp'] = 'required|unique:members';
        }
        $validatedData=$request->validate($rules);
        member::where('ktp', $model->ktp)
            ->update($validatedData);
            //dd('berhasil');
        return redirect('tampil_member')->with('status', 'Data Member Telah Diupdate');
    }
}