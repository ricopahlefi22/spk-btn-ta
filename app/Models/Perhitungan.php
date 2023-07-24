<?php

namespace App\Models;

class Perhitungan extends Model{
	protected $table = 'perhitungan';
	protected $guarded =['id'];

	public function bobot(){
		return $this->hasMany(SubPerhitungan::class, 'id_perhitungan');
	}

	public function nasabah(){
		return $this->belongsTo(Nasabah::class, 'id_nasabah');
	}

}
