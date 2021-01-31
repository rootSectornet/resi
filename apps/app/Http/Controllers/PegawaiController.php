<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{

    public function index()
    {
    	$users = User::with('jabatan')->get();
    	$jabatan = Jabatan::get();
    	return view('pegawai.list',['users' => $users,'jabatan' => $jabatan]);
    }
    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->alamat = $request->alamat;
        $user->no_hp = $request->no_hp;
        $user->jabatan_id = $request->jabatan_id;
        $user->save();
        return redirect('pegawai');
    }
    public function update($id,Request $request)
    {
        User::where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'jabatan_id' => $request->jabatan_id,
            'no_hp' => $request->no_hp,
            ]);
        return redirect('pegawai');
    }
    public function hapus($id)
    {
        User::where('id', $id)
        ->delete();
        return redirect('pegawai');
    }
}
