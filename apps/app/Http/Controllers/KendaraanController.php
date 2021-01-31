<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Validator;

class KendaraanController extends Controller
{

    public function index()
    {
    	$kendaraan = Kendaraan::get();
    	return view('kendaraan.list',['kendaraan' => $kendaraan]);
    }
    public function create(Request $request)
    {
        $kendaraan = new Kendaraan();
        $kendaraan->no_polisi = $request->no_polisi;
        $kendaraan->no_kendaraan = $request->no_kendaraan;
        $kendaraan->status = $request->status;
        $kendaraan->save();
        return redirect('kendaraan');
    }
    public function update($id,Request $request)
    {
        Kendaraan::where('id', $id)
        ->update(['no_polisi' => $request->no_polisi,'no_kendaraan' => $request->no_kendaraan,'status' => $request->status]);
        return redirect('kendaraan');
    }
    public function hapus($id)
    {
        Kendaraan::where('id', $id)
        ->delete();
        return redirect('kendaraan');
    }
}
