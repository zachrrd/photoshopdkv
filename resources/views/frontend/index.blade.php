@extends('layouts.frontend')

@section('content')

<!-- Hero Section -->
<section class="py-5" style="background-color: #4C7F68; color: white;">
    <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between">
        <div>
            <h1 class="fw-bold mb-3">Explore Visual <br>Stories by DKV</h1>
            <p class="fst-italic">Discover and purchase breathtaking photos<br>from talented photographers</p>
        </div>
        <div>
            <img src="{{ asset('camera.png') }}" style="max-width: 300px;">

        </div>
    </div>
</section>

<!-- Button Section -->
<section class="py-4 text-center text-white" style="background-color: #E1F0E5;">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
            <a href="#gallery" class="btn fw-bold px-4 py-2 w-100 w-md-auto"
                style="background-color: #FFE066; color: #247BA0;">Gallery</a>
            <a href="#team" class="btn fw-bold px-4 py-2 w-100 w-md-auto"
                style="background-color: #FFE066; color: #247BA0;">Our Team</a>
            <a href="#upload" class="btn fw-bold px-4 py-2 w-100 w-md-auto"
                style="background-color: #FFE066; color: #247BA0;">Add Your Photo!</a>
        </div>
    </div>
</section>

<!-- Editors Choice -->
<section class="py-5" id="gallery">
    <div class="container">
        <h4 class="fw-bold mb-4 text-primary" style="color:#247BA0;">Editors Choice</h4>
        <div class="row">
            @foreach ($foto as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $item->file_path) }}" alt="{{ $item->judul_foto }}"
                        class="card-img-top" style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->judul_foto }}</h5>
                        <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-muted">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            <span class="badge {{ $item->stok > 0 ? 'bg-success' : 'bg-secondary' }}">
                                {{ $item->stok > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>
                    </div>
                    <div class="card-footer text-end bg-white border-top-0">
                        <button class="btn btn-sm btn-warning fw-bold" {{ $item->stok > 0 ? '' : 'disabled' }}>
                            {{ $item->stok > 0 ? 'Beli' : 'Stok Habis' }}
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="text-white text-center mb-5"
    style="background: url('{{ asset('quote.png') }}') center/cover no-repeat; padding: 100px 20px;">

    <div class="container">
        <blockquote class="blockquote fw-bold">
            <p class="mb-0">
                "In every frame we capture, a moment stands still — <br>
                a whisper of time, a flicker of light,<br>
                a story untold, yet deeply felt.<br>
                Through the lens, we remember not just what we saw, <br>
                but how it made us feel —<br>
                forever etched in color, in shadow, in silence."
            </p>
        </blockquote>

    </div>
</section>

<!-- Footer Section -->
<footer class="pt-5 pb-4 text-white" style="background-color: #4C7F68;">

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
                <iframe src="https://www.google.com/maps?q=Jl.+Cokroaminoto+No.84,+Denpasar,+Bali&output=embed"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</footer>

@endsection