<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class gurucontroller extends Controller
{
    public function profile($id)
    {
    	$guru = Guru::find($id);
    	return view('guru.profil',['guru' => $guru]);
    }
}
