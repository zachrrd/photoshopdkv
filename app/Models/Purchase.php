<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foto_id',
        'quantity',
        'price_at_purchase',
        'ukuran_at_purchase',
        'total_amount',
        'payment_status',
        'transaction_id',
        'payment_method',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
}