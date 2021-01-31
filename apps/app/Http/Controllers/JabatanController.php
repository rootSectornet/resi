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
        $jabatan = new Jabatan();
        $jabatan->name = $request->jabatan;
        $jabatan->save();
        return redirect('jabatans');
    }
    public function update($id,Request $request)
    {
        Jabatan::where('id', $id)
        ->update(['name' => $request->jabatan]);
        return redirect('jabatans');
    }
    public function hapus($id)
    {
        Jabatan::where('id', $id)
        ->delete();
        return redirect('jabatans');
    }
}
