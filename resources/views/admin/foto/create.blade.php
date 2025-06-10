@extends('layouts.admin')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">
            Add Foto
            <a href="{{ url('/admin/foto') }}" class="btn btn-danger float-end    ">Back</a>
        </h4>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('/admin/foto') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Judul Foto -->
                <div class="col-md-12 mb-3">
                    <label for="judul_foto">Judul Foto</label>
                    <input type="text" name="judul_foto" class="form-control" required>
                </div>

                <!-- Deskripsi -->
                <div class="col-md-12 mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>

                <!-- Kategori -->
                <div class="col-md-6 mb-3">
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" class="form-control">
                </div>

                <!-- Ukuran -->
                <div class="col-md-6 mb-3">
                    <label for="ukuran">Ukuran</label>
                    <input type="text" name="ukuran" class="form-control">
                </div>

                <!-- Harga -->
                <div class="col-md-6 mb-3">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" step="0.01" required>
                </div>

                <!-- Stok -->
                <div class="col-md-6 mb-3">
                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>

                <!-- File Path (Upload Foto) -->
                <div class="col-md-12 mb-3">
                    <label for="file_path">Upload Foto</label>
                    <input type="file" name="file_path" class="form-control" accept="image/*" required>
                </div>

                <!-- Tanggal Upload -->
                <div class="col-md-6 mb-3">
                    <label for="tgl_upload">Tanggal Upload</label>
                    <input type="date" name="tgl_upload" class="form-control">
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="tersedia">Tersedia</option>
                        <option value="habis">Habis</option>
                    </select>
                </div>

                <!-- Submit -->
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Simpan Foto</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection