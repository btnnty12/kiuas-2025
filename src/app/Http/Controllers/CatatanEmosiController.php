<?php

namespace App\Http\Controllers;

use App\Models\CatatanEmosi;
use Illuminate\Http\Request;

class CatatanEmosiController extends Controller
{
    public function index()
    {
        return CatatanEmosi::with('remajaAnak')->get();
    }
}