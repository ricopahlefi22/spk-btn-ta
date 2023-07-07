<?php

namespace App\Http\Controllers;


class NasabahController extends Controller
{
	function BerandaNasabah(){
		return view('Admin.Nasabah.beranda');
	}

	function CreateNasabah(){
		return view('Admin.Nasabah.create');
	}
}