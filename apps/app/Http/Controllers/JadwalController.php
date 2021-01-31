<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Auth;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{

    public function create(Request $request)
    {
        $jadwal = new Jadwal();
        $jadwal->tanggal = $request->tanggal;
        $jadwal->durasi = $request->durasi;
        $jadwal->lokasi_tujuan = $request->lokasi_tujuan;
        $jadwal->tujuan = $request->tujuan;
        $jadwal->status = 0;
        $jadwal->id_marketing = Auth::user()->id;
        $jadwal->id_driver = NULL;
        $jadwal->id_kendaraan = NULL;
        //['tanggal', 'durasi', 'lokasi_tujuan','tujuan','status','id_marketing','id_driver','id_kendaraan']
        $jadwal->save();
        return redirect('/');
    }
    public function aprove($id,Request $request)
    {
        Jadwal::where('id', $id)
        ->update(['status' => 1,'id_driver' => $request->id_driver,'id_kendaraan' => $request->id_kendaraan]);
        return redirect('/');
    }
    public function selesai($id,Request $request)
    {
        Jadwal::where('id', $id)
        ->update(['status' => 2]);
        return redirect('/');
    }
    public function hapus($id)
    {
        Jadwal::where('id', $id)
        ->delete();
        return redirect('/');
    }
}
