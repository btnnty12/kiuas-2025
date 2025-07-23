<?php

namespace App\Http\Controllers;

use App\Models\RemajaAnak;
use Illuminate\Http\Request;

class RemajaAnakController extends Controller
{
    public function index()
    {
        $remaja = Remaja::all();
        return view('remaja.index', compact('remaja'));
    }

    public function show($id)
    {
        $remaja = Remaja::findOrFail($id);
        return view('remaja.show', compact('remaja'));
    }
}
