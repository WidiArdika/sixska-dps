<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();
        $pengumumanPertama = Pengumuman::latest()->first();
        $pengumumanKedua   = Pengumuman::latest()->skip(1)->take(1)->first();
        return view('pages.informasi.pengumuman', compact('pengumuman', 'pengumumanPertama', 'pengumumanKedua'));
    }

    public function show($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)->firstOrFail();

        // Ambil 5 pengumuman terbaru selain yang sedang dibuka
        $pengumumanTerbaru = Pengumuman::where('id', '!=', $pengumuman->id)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.informasi.pengumuman-show', compact('pengumuman', 'pengumumanTerbaru'));
    }
}
