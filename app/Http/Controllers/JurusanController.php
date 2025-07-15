<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function show($slug)
    {
        // Manual query berdasarkan slug
        $jurusan = Jurusan::where('slug', $slug)->firstOrFail();
        
        // Ambil jurusan lainnya
        $jurusans = Jurusan::where('id', '!=', $jurusan->id)->latest()->get();

        return view('pages.jurusan.show', compact('jurusan', 'jurusans'));
    }
}