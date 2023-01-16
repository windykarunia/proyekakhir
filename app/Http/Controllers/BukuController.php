<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class BukuController extends Controller
{
    public function input() {
        return view('input_buku');
    }

    public function kirim(Request $request) {
        $validatedData = $request->validate([
            'id_buku'=>['required','min:3','unique:bukus'],
            'judul_buku'=>'required',
            'tahun'=>'required',
            'penulis'=>'required',
            'stok_buku'=>'required'
        ]);
        buku::create($validatedData);
        return redirect('tampil_buku')->with('status', 'Buku Berhasil Diinput');
    }

    public function tampil(){
        $model = new buku;
        $data=$model->all();
        return view('tampil_buku',['data'=>$data]);
    }

    public function hapus($id_buku){
        $model = buku::find($id_buku);
        $model->delete();
        return redirect('tampil_buku')->with('status-deleted','Buku Berhasil Dihapus');
    }

    public function edit($id_buku){
        $model= buku::find($id_buku);
        return view('edit_buku')->with('post',$model);
    }

    public function update(Request $request, $id_buku){
        $model= buku::find($id_buku);
        $rules = [
            'judul_buku'=>'required',
            'tahun'=>'required',
            'penulis'=>'required',
            'stok_buku'=>'required'
        ];
        if ($request->id_buku != $model->id_buku) {
            $rules['id_buku'] = 'required|unique:bukus';
        }
        $validatedData=$request->validate($rules);
        buku::where('id_buku', $model->id_buku)
            ->update($validatedData);
            //dd('berhasil');
        return redirect('tampil_buku')->with('status', 'Updated');
    }
}
