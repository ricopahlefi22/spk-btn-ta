<?php

namespace App\Http\Controllers;


class KlasifikasiController extends Controller
{
	function BerandaKlasifikasi(){
		return view('Admin.Klasifikasi.beranda');
	}

	function createKlasifikasi(){
		return view('Admin.Klasifikasi.create');
	}
}