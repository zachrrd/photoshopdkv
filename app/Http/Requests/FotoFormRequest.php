<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class FotoformRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'user_id'=>['required'],
        'judul_foto'=>['required'],
        'deskripsi'=>['required'],
        'kategori'=>['required'],
        'ukuran'=>['required'],
        'harga'=>['required'],
        'stok'=>['required'],
        'file_path' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'tgl_upload'=>['required'],
        'status'=>['required'],
        ];
    }
    protected function prepareForValidation(): void
{
    $this->merge([
        'user_id' => Auth::id(),
    ]);
}}