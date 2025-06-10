@extends('layouts.admin')

@section('content')

<div class="card mt-4">
    <div class="card-header">
        <h4 class="mb-0">
            Foto
            <a href="{{ url('/admin/foto/create') }}" class="btn btn-primary float-end">Add Foto</a>
        </h4>
    </div>
    <div class="card-body">

        @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Foto</th>
                    <th>Status</th>
                    <th>Stok</th>
                    <th>Foto</th>
                    <th>Tanggal Upload</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foto as $item)
                <tr>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->judul_foto }}</td>
                    <td>{{ $item->status == 'tersedia' ? 'tersedia' : 'habis' }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->file_path) }}" alt="Foto" class="img-thumbnail"
                            style="max-width: 120px;">
                    </td>
                    <td>{{ $item->tgl_upload }}</td>
                    <td>
                        <a href="{{ route('foto.show', $item->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('foto.edit', $item->id) }}" class="btn btn-success">Edit</a>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('foto.delete', $item->id) }}"
                            method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete({{ $item->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: "Data ini tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>

<!-- SweetAlert Success After Action -->
@if (session('status'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('
    status ') }}',
    timer: 2000,
    showConfirmButton: false
});
</script>
@endif


@endsection