<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Resources\Jabatan as JabatanResource;
use App\Http\Resources\JabatanCollection;

class JabatanController extends Controller
{

    public function index()
    {
    	$jabatan = Jabatan::get();
    	return view('jabatan.list',['jabatan' => $jabatan]);
    }
    public function create()
    {
    	return view('jabatan.create');
    }
}
