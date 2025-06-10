<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto; // <<< Pastikan kamu mengimpor model Foto kamu di sini!

class DashboardController extends Controller
{
    /**
     * Display the dashboard view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $foto = Foto::where('status', 'tersedia')->inRandomOrder()->take(6)->get();

        // Tambahkan baris ini untuk debugging
        // dd($foto->toArray()); // Ini akan menghentikan eksekusi dan menampilkan isi $foto

        return view('dashboard', compact('foto'));
    }

         public function show($id)
    {
        // Mengambil foto berdasarkan ID, dan memuat relasi user
        $product = Foto::with('user')->findOrFail($id);

        return view('detailproduk', compact('product'));
    }
}