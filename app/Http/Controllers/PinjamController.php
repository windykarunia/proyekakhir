<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\member;
use App\Models\pinjam;

class PinjamController extends Controller
{
    public function input() {
        $member = member::all();
        $buku = buku::all();
        return view('input_pinjam',compact('member'))->with('buku' ,$buku);
    }

    public function kirim(Request $request) {
        $validatedData = $request->validate([
            'id_buku'=>'required',
            'id_member'=>'required',
            'tanggal_peminjaman'=>'required',
            'tanggal_pengembalian'=>'required',
            'jenis'=>'required',

        ]);
        // dd($validatedData);
        $id_member = $request -> id_member;
        $data = member::find($id_member);
        $nama_member = $data -> nama_member;
        $id_buku = $request -> id_buku;
        $item = buku::find($id_buku);
        $nama_buku = $item -> nama_buku;
        // dd($nama_member, $nama_buku);
        pinjam::create([
            'id_buku'=>$validatedData['id_buku'],
            'id_member'=>$validatedData['id_member'],
            'nama_member'=>$nama,
            'judul_buku'=>$judulbuku,
            'tanggal_peminjaman'=>$validatedData['tanggal_peminjaman'],
            'tanggal_pengembalian'=>$validatedData['tanggal_pengembalian'],
            'jenis'=>$validatedData['jenis'],
        ]);
        return redirect('tampil_pinjam')->with('status', 'Data pinjam Berhasil Dimasukkan');
    }

    public function tampil(){
        $model = new pinjam;
        $data=$model->all();
        return view('tampil_pinjam',['data'=>$data]);
    }

    public function hapus($id_buku){
        $model = pinjam::find($id_buku);
        $model->delete();
        return redirect('tampil_pinjam')->with('status-deleted','Data pinjam Telah Dihapus');
    }

    public function edit($id){
        $member = member::all();
        $buku = buku::all();
        $model= pinjam::find($id);
        return view('edit_pinjam', [
            'post'=>$model,
            'nama_member'=>$nama_member,
            'buku'=>$buku
        ]);
    }

    public function update(Request $request, $id){
        $model= pinjam::find($id);
        $rules = [
            'id_buku'=>'required',
            'id_member'=>'required',
            'tanggal_peminjaman'=>'required',
            'tanggal_pengembalian'=>'required',
            'jenis'=>'required',
        ];
        $id_member = $request -> id_member;
        $data = member::find($id_member);
        $nama_member = $data -> nama_member;
        $id_buku = $request -> id_buku;
        $item = buku::find($id_buku);
        $judulbuku = $item -> judul_buku;
        // dd($nama_member, $nama_buku);
        $validatedData=$request->validate($rules);
        pinjam::where('id', $model->id)
            ->update([
                'id_buku'=>$validatedData['id_buku'],
                'id_member'=>$validatedData['id_member'],
                'nama_member'=>$nama_member,
                'judul_buku'=>$judul_buku,
                'tanggal_peminjaman'=>$validatedData['tanggal_peminjaman'],
                'tanggal_pengembalian'=>$validatedData['tanggal_pengembalian'],
                'jenis'=>$validatedData['jenis']
            ]);
            //dd('berhasil');
        return redirect('tampil_pinjam')->with('status', 'Data peminjaman Telah Diupdate');
    }
}
