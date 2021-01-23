<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Resources\Jabatan as JabatanResource;
use App\Http\Resources\JabatanCollection;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{

    public function index()
    {
    	$jabatan = Jabatan::get();
    	return view('jabatan.list',['jabatan' => $jabatan]);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jabatan' => 'required|string',
        ])->validate();
        return redirect('jabatans')->withErrors($validator, 'jabatan');
    }
}
