<?php

namespace App\Models;

class PerhitunganKriteria extends Model{
	protected $table = 'perhitungan_kriteria';
	protected $guarded =['id'];

	public function kode1(){
		return $this->belongsTo(Kriteria::class);
	}

	public function kode2(){
		return $this->belongsTo(Kriteria::class);
	}
}