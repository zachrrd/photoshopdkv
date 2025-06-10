@extends('layouts.admin')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">
            Show Foto
            <a href="{{ url('/admin/foto') }}" class="btn btn-danger float-end">Back</a>
        </h4>
    </div>
    <div class="card-body">
        @if($foto->file_path)
        <div class="mb-3">
            <h4>Gambar:</h4>
            <img src="{{ asset('storage/' . $foto->file_path) }}" alt="Foto" class="img-fluid"
                style="max-width: 400px;">
        </div>
        @endif

        <h4>Judul Foto: {{$foto->judul_foto}}</h4>
        <h4>Deskripsi: {{$foto->deskripsi}}</h4>
        <h4>Kategori: {{$foto->kategori}}</h4>
        <h4>Ukuran: {{$foto->ukuran}}</h4>
        <h4>Harga: {{$foto->harga}}</h4>
        <h4>Stok: {{$foto->stok}}</h4>
        <h4>Tanggal Upload: {{$foto->tgl_upload}}</h4>
        <h4>Status: {{$foto->status == 'tersedia' ? 'tersedia' : 'habis'}}</h4>
    </div>

    @endsection