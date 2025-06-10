@extends('layouts.frontend')

@section('content')
<section class="py-5" style="padding-top: 80px; min-height: calc(100vh - 250px);">
    <div class="container text-center">
        <div class="card shadow-sm p-5">
            <h1 class="text-success mb-4">Pembelian Berhasil!</h1>
            <p class="lead">Terima kasih atas pembelian Anda. Stok produk telah diperbarui.</p>
            <p>Ini adalah simulasi pembelian cepat. Tidak ada pembayaran riil yang terjadi.</p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4"
                style="background-color: #247BA0; border-color: #247BA0;">Kembali ke Beranda</a>
        </div>
    </div>
</section>
@endsection