<?php

namespace App\Http\Controllers;


class SuperAdminController extends Controller
{
	function Beranda(){
		return view('SuperAdmin.beranda');
	}
}