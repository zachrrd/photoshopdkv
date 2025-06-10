<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;

class FrontendController extends Controller
{
    public function index()
    {
        $foto = Foto::where('status', 'tersedia')->inRandomOrder()->take(6)->get();

        // Tambahkan baris ini untuk debugging
        // dd($foto->toArray()); // Ini akan menghentikan eksekusi dan menampilkan isi $foto

        return view('frontend.index', compact('foto'));
    }


}