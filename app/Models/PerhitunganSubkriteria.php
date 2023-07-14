<?php

namespace App\Models;

class PerhitunganSubkriteria extends Model{
	protected $table = 'perhitungan_subkriteria';
	protected $guarded =['id'];

	public function id_subkriteria_1(){
		return $this->belongsTo(Subkriteria::class);
	}

	public function id_subkriteria_2(){
		return $this->belongsTo(Subkriteria::class);
	}
}