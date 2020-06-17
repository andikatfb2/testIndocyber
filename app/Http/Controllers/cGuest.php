<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\mProduk;

class cGuest extends Controller
{
    public function index()
    {
        $data = mProduk::all();
        return view('welcome', compact('data'));
    }

}
