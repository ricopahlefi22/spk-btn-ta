<?php

namespace App\Models;

class SubPerhitungan extends Model{
	protected $table = 'sub_perhitungan';
	protected $guarded =['id'];

	public function perhitungan(){
		return $this->belongsTo(Perhitungan::class);
	}

}