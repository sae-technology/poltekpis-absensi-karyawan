<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        return view('master.divisi-list');
    }

    public function tambahDivisi()
    {
        return view('master.divisi-add');
    }
}
