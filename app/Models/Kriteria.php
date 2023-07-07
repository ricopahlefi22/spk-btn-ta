<?php

namespace App\Models;

class Kriteria extends Model{
	protected $table = 'kriteria';
	protected $guarded =['id'];

	public function subkriteria(){
		return $this->hasMany(Subkriteria::class, 'kriteria_id');
	}

	public function kriteria1(){
		return $this->hasMany(PerhitunganKriteria::class, 'id_kriteria_1');
	}

	public function kriteria2(){
		return $this->hasMany(PerhitunganKriteria::class, 'id_kriteria_2');
	}

}