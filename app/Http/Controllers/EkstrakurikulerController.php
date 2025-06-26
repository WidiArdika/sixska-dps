<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::latest()->get();
        return view('pages.kesiswaan.ekstrakurikuler', compact('ekstrakurikulers'));
    }

    public function show($slug)
    {
        $ekstrakurikulers = Ekstrakurikuler::where('slug', $slug)->firstOrFail();
        return view('pages.kesiswaan.ekstrakurikuler-show', compact('ekstrakurikulers'));
    }
}
