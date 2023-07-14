<?php

namespace App\Models;

class Perhitungan extends Model{
	protected $table = 'perhitungan';
	protected $guarded =['id'];

	public function subkriteria(){
		return $this->hasMany(Subkriteria::class, 'id_subkriteria');
	}

	public function subperhitungan(){
		return $this->hasMany(SubPerhitungan::class, 'id_perhitungan');
	}

	public function nasabah(){
		return $this->belongsTo(Nasabah::class);
	}

}