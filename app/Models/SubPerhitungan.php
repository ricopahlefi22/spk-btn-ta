<?php

namespace App\Models;

class SubPerhitungan extends Model{
	protected $table = 'sub_perhitungan';
	protected $guarded =['id'];

	public function perhitungan(){
		return $this->belongsTo(Perhitungan::class);
	}

	public function subkriteria(){
		return $this->belongsTo(Subkriteria::class, 'id_subkriteria');
	}

}