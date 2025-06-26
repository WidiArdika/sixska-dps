<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('pages.kesiswaan.prestasi', compact('prestasi'));
    }

    public function show($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();
        return view('pages.kesiswaan.prestasi-show', compact('prestasi'));
    }
}
