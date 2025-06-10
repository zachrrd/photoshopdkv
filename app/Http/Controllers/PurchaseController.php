<?php

namespace App\Http\Controllers;

use App\Models\Foto; // Asumsi model produk Anda adalah Foto
use App\Models\Purchase; // Model Purchase yang baru dibuat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang sedang login
use Illuminate\Support\Facades\DB; // Untuk transaksi database

class PurchaseController extends Controller
{
    public function store(Request $request, Foto $product) // Menggunakan Route Model Binding
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk melakukan pembelian.');
        }

        // Mulai transaksi database untuk memastikan konsistensi data
        try {
            DB::beginTransaction();

            // 1. Cek stok produk
            if ($product->stok <= 0) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Stok produk ini sudah habis.');
            }

            // 2. Buat record pembelian (dianggap langsung terbayar)
            Purchase::create([
                'user_id' => Auth::id(),
                'foto_id' => $product->id,
                'quantity' => $request->input('quantity', 1), // Ambil dari form atau default 1
                'price_at_purchase' => $request->input('price_at_purchase'), // Ambil dari form
                'ukuran_at_purchase' => $request->input('ukuran_at_purchase'), // Ambil dari form
                'total_amount' => $request->input('quantity', 1) * $request->input('price_at_purchase'),
                'payment_status' => 'paid', // LANGSUNG DIANGGAP TERBAYAR
                'transaction_id' => 'DEMO_' . uniqid(), // ID transaksi dummy untuk demo
                'payment_method' => 'Simulasi', // Metode pembayaran dummy
            ]);

            // 3. Kurangi stok produk
            $product->stok -= $request->input('quantity', 1);
            if ($product->stok < 0) { // Pastikan stok tidak menjadi negatif
                $product->stok = 0;
            }
            $product->save(); // Simpan perubahan stok

            DB::commit(); // Commit transaksi jika semua berhasil

            // Redirect ke halaman sukses (bisa halaman statis atau dynamic)
            return redirect()->route('purchase.success')->with('success', 'Pembelian berhasil! Stok produk telah diperbarui.');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika ada error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pembelian: ' . $e->getMessage());
        }
    }
}