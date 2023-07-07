<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use App\Models\PerhitunganKriteria;
use Illuminate\Http\Request;


class KriteriaController extends Controller
{
	function BerandaKriteria(){
		$data['list_kriteria'] = Kriteria::all();
		return view('Admin.Kriteria.beranda', $data);
	}

	function CreateKriteria(){
		$kode = Kriteria::max('kode');
		if($kode == null){
			$kode_kriteria = 1;
		} else {
			$kode_kriteria = substr($kode, 1,2)+1;
		}
		$data['kode'] = "C".$kode_kriteria;
		return view('Admin.Kriteria.create', $data);
	}

	function store(Request $request){
		$request->validate(
            [
                'kode' => ($request->id) ? 'required' : 'required|unique:kriteria',
            ]
        );

		$kriteria = new Kriteria;
		$kriteria-> kode = request('kode');
		$kriteria-> nama = request('nama');
		$kriteria-> jenis = request('jenis');

		$kriteria-> save();


		return redirect ('Admin/kriteria')->with('success', 'Data Kriteria berhasil ditambahkan');

	}

	function edit(Kriteria $kriteria){
		$data['kriteria'] = $kriteria;
		return view('Admin.Kriteria.edit', $data);

	}

	function update(Kriteria $kriteria){
		$kriteria-> kode = request('kode');
		$kriteria-> nama = request('nama');
		$kriteria-> jenis = request('jenis');
		$kriteria-> save();


		return redirect ('Admin/kriteria')-> with ('success', 'Data Kriteria berhasil diedit');

	}

	function destroy(Kriteria $kriteria){
		foreach(
			$kriteria->subkriteria as $subkriteria
		){
			$subkriteria->delete();
		}


		$kriteria->delete();

		return redirect ('Admin/kriteria')-> with ('danger', 'Data Kriteria berhasil dihapus');

	}

	function berandaperhitungan(Kriteria $kriteria){
		$data['list_kriteria'] = Kriteria::all();
		$data['skala_1'] = PerhitunganKriteria::where('id_kriteria_1', 9)->get();

		return view('Admin.Kriteria.perhitungan', $data);
	}

	function perhitungan(){
		$perhitungankriteria = new PerhitunganKriteria;
		$perhitungankriteria-> id_kriteria_1 = request('kriteria1');
		$perhitungankriteria-> id_kriteria_2 = request('kriteria2');
		$perhitungankriteria-> skala = request('skala');
		$perhitungankriteria-> save();


		return redirect ('Admin/perhitungan-kriteria')-> with ('success', 'Skala Kriteria berhasil ditambahkan');

	}

}