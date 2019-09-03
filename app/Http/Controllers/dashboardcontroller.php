<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class dashboardcontroller extends Controller
{
	public function index()
	{
		
		return view('dashboards.index');
	}
}