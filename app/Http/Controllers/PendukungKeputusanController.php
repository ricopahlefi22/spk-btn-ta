<?php

namespace App\Http\Controllers;


class PendukungKeputusanController extends Controller
{
	function BerandaPendukungKeputusan(){
		return view('Admin.PendukungKeputusan.beranda');
	}

	function createPendukungKeputusan(){
		return view('Admin.PendukungKeputusan.create');
	}
}