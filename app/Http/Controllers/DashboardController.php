<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\member;
use App\Models\pinjam;

class DashboardController extends Controller
{
    public function mount(){
    }
    public function index(){
        $jumlahmember=member::count();
        $jumlahpinjam=pinjam::count();
        $pinjam=pinjam::select()->get()->groupBy('jenis');
        // dd($pinjam);
        $jeniss=[];
        $jenisCount=[];
        foreach($pinjam as $jenis => $values){
            $jeniss[]=$jenis;
            $jenisCount[]=count($values);
        }
        // dd($jenis,$jenisCount);
        return view('dashboard',[
                                'jumlahmember'=>$jumlahmember,
                                'jumlahpinjam'=>$jumlahpinjam,
                                'jeniss'=>$jeniss,
                                'jenisCount'=>$jenisCount
                                ]);
    }
}
