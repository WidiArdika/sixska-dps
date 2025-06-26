<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function show(Jurusan $jurusan)
    {
        return view('pages.jurusan.show', compact('jurusan'));
    }
}
