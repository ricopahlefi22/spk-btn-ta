<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Nasabah;

class AdminController extends Controller
{
	function Beranda(){
		$data['list_kriteria'] = Kriteria::all();
		$data['list_nasabah'] = Nasabah::all();
		return view('Admin.beranda', $data);
	}
}