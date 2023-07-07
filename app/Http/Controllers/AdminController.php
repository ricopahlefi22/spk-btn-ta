<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
	function Beranda(){
		return view('Admin.beranda');
	}
}