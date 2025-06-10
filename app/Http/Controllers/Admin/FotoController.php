<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FotoFormRequest;
use App\Models\Foto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
   public function index(){
      $foto = Foto::get();
    return view('admin.foto.index', compact('foto'));
   }

      public function create(){
    return view('admin.foto.create');
   }

   public function store(FotoFormRequest $request)
   {
    $data = $request->validated();

    // Upload file
    if ($request->hasFile('file_path')) {
        $data['file_path'] = $request->file('file_path')->store('foto', 'public');
    }

    // Tambahkan user_id dari user yang login
    $data['user_id'] = Auth::id();

    Foto::create($data);

    return redirect('/admin/foto')->with('success', 'Foto berhasil disimpan.');
   }
public function show(Foto $foto)
{
    return view('admin.foto.show', compact('foto'));
}

      public function edit(Foto $foto){
    return view('admin.foto.edit', compact('foto'));
   }  

public function update(FotoFormRequest $request, Foto $foto)
{
    $data = $request->validated();

    // Hapus file lama jika ada file baru di-upload
    if ($request->hasFile('file_path')) {
        // Hapus file lama (jika ada)
        if ($foto->file_path && Storage::disk('public')->exists($foto->file_path)) {
            Storage::disk('public')->delete($foto->file_path);
        }

        // Simpan file baru
        $data['file_path'] = $request->file('file_path')->store('foto', 'public');
    }

    // Set user_id dari user yang login
    $data['user_id'] = Auth::id();

    // Update data
    $foto->update($data);

    return redirect('/admin/foto')->with('status', 'Foto berhasil diupdate.');
}
public function destroy($id)
{
    $foto = Foto::findOrFail($id);
    $foto->delete();

    return redirect('/admin/foto')->with('status', 'Foto berhasil dihapus.');
}

}