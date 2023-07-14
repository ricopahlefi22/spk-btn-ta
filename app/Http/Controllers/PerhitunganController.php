<?php

namespace App\Http\Controllers;
use App\Models\Perhitungan;
use App\Models\SubPerhitungan;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Nasabah;

class PerhitunganController extends Controller
{
	function Beranda(){
		$data['list_perhitungan'] = Perhitungan::all();
		$data['list_kriteria'] = Kriteria::all();
		return view('Karyawan.Perhitungan.beranda', $data);
	}

	function create(){
		$data['list_nasabah'] = Nasabah::all();
		$data['list_kriteria'] = Kriteria::all();
		return view('Karyawan.Perhitungan.create', $data);
	}

	function simpan(){
		$perhitungan = new Perhitungan;
		$perhitungan->id_nasabah = request('id_nasabah');
		$perhitungan->save();

		$list_kriteria = Kriteria::all();
		foreach($list_kriteria as $kriteria){
				$subperhitungan = new SubPerhitungan;
				$subperhitungan->id_perhitungan = $perhitungan->id;
				$subperhitungan->id_subkriteria = request('id_subkriteria_{{$kriteria->id}}');
				$subperhitungan->save();
		}



		return redirect('Karyawan/perhitungan')->with('success', 'Data Berhasil Ditambahkan');
	}
}