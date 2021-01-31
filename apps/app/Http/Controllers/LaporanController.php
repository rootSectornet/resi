<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{

    public function index()
    {
    	$kendaraan = Kendaraan::get();
    	return view('kendaraan.list',['kendaraan' => $kendaraan]);
    }
}
