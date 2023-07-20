<?php

namespace App\Http\Controllers;
use App\Models\Perhitungan;
use App\Models\SubPerhitungan;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Nasabah;
use Illuminate\Http\Request;

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

	function tambahbobot(Perhitungan $perhitungan){
		$data['perhitungan'] = $perhitungan;
		$data['list_nasabah'] = Nasabah::all();
		$data['list_kriteria'] = Kriteria::all();
		return view('Karyawan.Perhitungan.edit', $data);
	}

	function simpan(Request $request){
		$request->validate(
            [
                'id_nasabah' => ($request->id) ? 'required' : 'required|unique:perhitungan',
            ],
            [
            	'id_nasabah.unique'=>'Nasabah ini sudah diproses',
            ]
        );

		$perhitungan = new Perhitungan;
		$perhitungan->id_nasabah = request('id_nasabah');
		$perhitungan->save();

		return redirect('Karyawan/perhitungan')->with('success', 'Data Penilaian Berhasil Ditambahkan');
	}

	function simpanbobot(SubPerhitungan $subperhitungan){
		
			$subperhitungan = new SubPerhitungan;
			$subperhitungan->id_perhitungan = request('id_perhitungan');
			$subperhitungan->id_subkriteria = request('id_subkriteria');
			$subperhitungan->save();

		return redirect()->back()->with('success', 'Data bobot berhasil ditambah');
	}

	function editbobot(SubPerhitungan $subperhitungan){
		$subperhitungan->id = $subperhitungan->id;
		$subperhitungan->id_perhitungan = $subperhitungan->id_perhitungan;
		$subperhitungan->id_subkriteria = request('id_subkriteria');
		$subperhitungan->update();

		return redirect()->back()->with('success', 'Data berhasil diedit');
	}

	function Hasil(){
		$data['list_perhitungan'] = Perhitungan::all();
		$data['list_kriteria'] = Kriteria::all();
		return view('Karyawan.Perhitungan.info', $data);
	}

	function hapus(Perhitungan $perhitungan){
		$subperhitungan = SubPerhitungan::where('id_perhitungan', $perhitungan->id)->get();

		if(!is_null($subperhitungan)){
		foreach(
			$subperhitungan as $subp
		){
			$subp->delete();
		}
		}


		$perhitungan->delete();

		return redirect ('Karyawan/perhitungan')-> with ('danger', 'Data Penilaian berhasil dihapus');
	}
}