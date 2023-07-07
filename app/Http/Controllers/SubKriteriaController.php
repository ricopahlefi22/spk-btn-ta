<?php

namespace App\Http\Controllers;
use App\Models\Subkriteria;
use App\Models\Kriteria;


class SubKriteriaController extends Controller
{
	function BerandaSubKriteria(Kriteria $kriteria){
		$data['list_kriteria'] = Kriteria::all();
		$data['kriteria'] = $kriteria->kode;
		// $data['list_subkriteria'] = Subkriteria::all();
		return view('Admin.Sub-Kriteria.beranda', $data);
	}

	function createSubKriteria(Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		return view('Admin.Sub-Kriteria.create', $data);
	}

	function store(Kriteria $kriteria){

		$subkriteria = new SubKriteria;
		$subkriteria-> kriteria_id = request('kriteria_id');
		$subkriteria-> nama = request('nama');
		$subkriteria-> bobot = request('bobot');

		$subkriteria-> save();


		return redirect ('Admin/sub-kriteria')->with('success', 'Data Subkriteria berhasil ditambahkan');

	}

	function edit(Subkriteria $subkriteria, Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		$data['subkriteria'] = $subkriteria;
		return view('Admin.Sub-Kriteria.edit', $data);

	}

	function update(Subkriteria $subkriteria){
		$subkriteria-> nama = request('nama');
		$subkriteria-> bobot = request('bobot');
		$subkriteria-> save();


		return redirect ('Admin/sub-kriteria')-> with ('success', 'Data Subkriteria berhasil diedit');

	}

	function destroy(Subkriteria $subkriteria){

		$subkriteria->delete();

		return redirect ('Admin/sub-kriteria')-> with ('danger', 'Data Subkriteria berhasil dihapus');

	}
}