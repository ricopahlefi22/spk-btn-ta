<?php

namespace App\Http\Controllers;
use App\Models\Nasabah;


class NasabahController extends Controller
{
	function BerandaNasabah(){
		$data['list_nasabah'] = Nasabah::all();
		return view('Admin.Nasabah.beranda', $data);
	}

	function CreateNasabah(){
		return view('Admin.Nasabah.create');
	}

	function simpan(){
		$nasabah = new Nasabah;
		$nasabah->nama = request('nama');
		$nasabah->ttl = request('ttl');
		$nasabah->jenis_kelamin = request('jenis_kelamin');
		$nasabah->alamat = request('alamat');
		$nasabah->handleUploadKTPpemohon();
		$nasabah->handleUploadKTPsuami();
		$nasabah->handleUploadKK();
		$nasabah->handleUploadSuratNikah();
		$nasabah->handleUploadNPWP();
		$nasabah->handleUploadSKPegawai();
		$nasabah->handleUploadSlipGaji();
		$nasabah->handleUploadSIUP();
		$nasabah->handleUploadTDP();
		$nasabah->handleUploadAktaPendirian();
		$nasabah->handleUploadAktaPengesahan();
		$nasabah->handleUploadDataKeuangan();
		$nasabah->handleUploadIzinPraktek();
		$nasabah->handleUploadRekeningKoran();
		$nasabah->handleUploadPasFoto();

		$nasabah->save();

		return redirect('Admin/nasabah')->with('success', 'Data Nasabah Berhasil Ditambahkan');
	}

	function edit(Nasabah $nasabah){
		$data['nasabah'] = $nasabah;
		return view('Admin.Nasabah.edit', $data);
	}

	function update(Nasabah $nasabah){
		$nasabah->nama = request('nama');
		$nasabah->ttl = request('ttl');
		$nasabah->jenis_kelamin = request('jenis_kelamin');
		$nasabah->alamat = request('alamat');
		$nasabah->handleUploadKTPpemohon();
		$nasabah->handleUploadKTPsuami();
		$nasabah->handleUploadKK();
		$nasabah->handleUploadSuratNikah();
		$nasabah->handleUploadNPWP();
		$nasabah->handleUploadSKPegawai();
		$nasabah->handleUploadSlipGaji();
		$nasabah->handleUploadSIUP();
		$nasabah->handleUploadTDP();
		$nasabah->handleUploadAktaPendirian();
		$nasabah->handleUploadAktaPengesahan();
		$nasabah->handleUploadDataKeuangan();
		$nasabah->handleUploadIzinPraktek();
		$nasabah->handleUploadRekeningKoran();
		$nasabah->handleUploadPasFoto();

		$nasabah->save();

		return redirect('Admin/nasabah')->with('success', 'Data Nasabah Berhasil Diedit');
	}

	function detail(Nasabah $nasabah){
		$data['nasabah'] = $nasabah;
		return view('Admin.Nasabah.detail', $data);
	}

	function destroy(Nasabah $nasabah){
		$nasabah->handleDeleteFile();
		$nasabah->delete();

		return redirect ('Admin/nasabah')-> with ('danger', 'Data Nasabah Berhasil Dihapus');

	}
}