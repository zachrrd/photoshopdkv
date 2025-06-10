@extends('layouts.frontend')

@section('content')
{{-- Bagian Detail Produk --}}
{{-- Tambahkan padding atas dan bawah lebih besar pada section ini --}}
<section class="py-5">
    <div class="container mt-4">
        {{-- Card Besar untuk Detail Produk --}}
        <div class="card shadow-sm mb-5">
            <div class="row g-0">
                <div class="col-md-5">
                    {{-- Gambar Produk --}}
                    {{-- Pastikan $product->file_path berisi nama file relatif dari storage/app/public --}}
                    <img src="{{ asset('storage/' . $product->file_path) }}" class="img-fluid rounded-start"
                        alt="{{ $product->judul_foto }}" style="object-fit: cover; height: 100%; max-height: 500px;">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <h2 class="card-title fw-bold mb-3">{{ $product->judul_foto }}</h2>
                        <p class="card-text text-muted fst-italic">{{ $product->deskripsi }}</p>

                        <hr>

                        <h4 class="fw-bold text-success mb-3">Rp {{ number_format($product->harga, 0, ',', '.') }}</h4>

                        <div class="mb-3">
                            <h6 class="fw-bold">Details:</h6>
                            <p class="mb-1">Size: {{ $product->ukuran ?? 'N/A' }}</p>
                            {{-- Menggunakan $product->ukuran --}}
                            <p class="mb-1">Date Taken:
                                {{ \Carbon\Carbon::parse($product->tgl_upload)->format('d/m/Y h:i A') }}</p>
                            {{-- Menggunakan $product->tgl_upload --}}
                            <p class="mb-1">Image taken by: {{ $product->user->name ?? 'N/A' }}</p>
                            {{-- Menggunakan relasi user --}}
                        </div>

                        <div class="d-grid mt-4">
                            @if ($product->stok > 0)
                            <form action="{{ route('purchase.store', $product->id) }}" method="POST">
                                @csrf
                                {{-- Tambahkan input tersembunyi jika perlu data lain --}}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price_at_purchase" value="{{ $product->harga }}">
                                <input type="hidden" name="ukuran_at_purchase" value="{{ $product->ukuran }}">

                                <button type="submit" class="btn btn-primary btn-lg fw-bold"
                                    style="background-color: #247BA0; border-color: #247BA0;">
                                    Beli Sekarang
                                </button>
                            </form>
                            @else
                            <button type="button" class="btn btn-primary btn-lg fw-bold"
                                style="background-color: #dc3545; border-color: #dc3545;" disabled>
                                Stok Habis
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Akhir Card Besar --}}

        {{-- Ini adalah tempat Anda bisa menambahkan spasi tambahan atau konten lain jika diperlukan --}}
        {{-- Contoh: Tambahkan div kosong dengan tinggi tertentu untuk spasi --}}
        <div style="height: 220px;"></div> {{-- Ini akan menambahkan spasi 100px di bawah card produk --}}

        {{-- Atau bisa juga dengan class Bootstrap margin-bottom yang lebih besar --}}
        {{-- <div class="mb-5"></div> --}}

    </div>
</section>
@endsection

{{-- Footer Section (Tetap di @section('footer') jika kamu punya yield di frontend.blade.php) --}}
@section('footer')
<footer class="pt-5 pb-4 text-white" style="background-color: #4C7F68;" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6>Alamat</h6>
                <p>Jl. Cokroaminoto No.84, Pemecutan Kaja, Kec. Denpasar Utara, Kota Denpasar, Bali 80118</p>
                <h6>Email</h6>
                <p>Darilencantacemail@gmail.com</p>
                <h6>No Telp</h6>
                <p>+62 896 0524 7080</p>
            </div>
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.331498762512!2d115.2072213745233!3d-8.665972588899846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240974b77f975%3A0xe5a225381a1795c4!2sSMK%20Negeri%201%20Denpasar!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                    {{-- Perlu diingat URL ini terlihat tidak valid untuk embed Google Maps --}} width="100%"
                    height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</footer>
@endsection