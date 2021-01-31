<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $jadwal = DB::table('jadwals')
            ->leftJoin('kendaraans', 'kendaraans.id', '=', 'jadwals.id_kendaraan')
            ->leftJoin('users', 'users.id', '=', 'jadwals.id_driver')
            ->select('jadwals.id','jadwals.*', 'users.name as driver', 'kendaraans.no_polisi','kendaraans.no_kendaraan',DB::raw("(SELECT users.name FROM users
                                WHERE users.id = jadwals.id_marketing ) as marketing"))
            ->get();
        if(Auth::user()->jabatan->name == 'DRIVER'){
            $jadwal = DB::table('jadwals')
                ->leftJoin('kendaraans', 'kendaraans.id', '=', 'jadwals.id_kendaraan')
                ->leftJoin('users', 'users.id', '=', 'jadwals.id_driver')
                ->select('jadwals.id','jadwals.*', 'users.name as driver', 'kendaraans.no_polisi','kendaraans.no_kendaraan',DB::raw("(SELECT users.name FROM users
                                    WHERE users.id = jadwals.id_marketing ) as marketing"))
                ->where('jadwals.id_driver',Auth::user()->id)
                ->get();
        }

        if(Auth::user()->jabatan->name == 'MARKETING'){
            $jadwal = DB::table('jadwals')
                ->leftJoin('kendaraans', 'kendaraans.id', '=', 'jadwals.id_kendaraan')
                ->leftJoin('users', 'users.id', '=', 'jadwals.id_driver')
                ->select('jadwals.id','jadwals.*', 'users.name as driver', 'kendaraans.no_polisi','kendaraans.no_kendaraan',DB::raw("(SELECT users.name FROM users
                                    WHERE users.id = jadwals.id_marketing ) as marketing"))
                ->where('jadwals.id_marketing',Auth::user()->id)
                ->get();
        }


        $jabatanDriver = DB::table('jabatans')
            ->select('jabatans.id as id')
            ->where('jabatans.name','DRIVER')
            ->get();

    	$driver = DB::table('users')
            ->select('users.*')
            ->where('users.jabatan_id',$jabatanDriver[0]->id)
            ->get();
        $kendaraan = DB::table('kendaraans')
            ->select('kendaraans.*')
            ->where('kendaraans.status',0)
            ->get();
    	return view('home',['jadwal' => $jadwal,'driver' => $driver,'kendaraan' => $kendaraan]);
    }
}
