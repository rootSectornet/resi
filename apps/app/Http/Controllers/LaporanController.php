<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{

    public function index()
    {
        $jadwal = [];
    	return view('laporan.index',['jadwal' => $jadwal]);
    }

    public function filter(Request $request){
        $jadwal = DB::table('jadwals')
            ->leftJoin('kendaraans', 'kendaraans.id', '=', 'jadwals.id_kendaraan')
            ->leftJoin('users', 'users.id', '=', 'jadwals.id_driver')
            ->select('jadwals.id','jadwals.*', 'users.name as driver', 'kendaraans.no_polisi','kendaraans.no_kendaraan',DB::raw("(SELECT users.name FROM users
                                WHERE users.id = jadwals.id_marketing ) as marketing"))
            ->where('jadwals.tanggal','>=',$request->tanggal_awal)
            ->where('jadwals.tanggal','<=',$request->tanggal_akhir)
            ->get();
        return view('laporan.index',['jadwal' => $jadwal]);
    }
}
