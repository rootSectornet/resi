<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal', 'durasi', 'lokasi_tujuan','tujuan','status','id_marketing','id_driver','id_kendaraan'];
    public function kendaraan(){
    	return $this->belongsTo(Kendaraan::class);
    }
    public function driver(){
    	return $this->belongsTo(User::class);
    }
    public function marketing(){
    	return $this->belongsTo(User::class);
    }
}
