<?php

namespace App\Models;

class Subkriteria extends Model{
	protected $table = 'sub_kriteria';
	protected $guarded =['id'];

	public function kriteria(){
		return $this->belongsTo(Kriteria::class);
	}

	public function subkriteria1(){
		return $this->hasMany(PerhitunganSubriteria::class, 'id_subkriteria_1');
	}

	public function subkriteria2(){
		return $this->hasMany(PerhitunganSubriteria::class, 'id_subkriteria_2');
	}

}