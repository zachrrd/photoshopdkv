<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming 'users' table exists
            $table->foreignId('foto_id')->constrained('foto')->onDelete('cascade'); // Links to your 'fotos' table

            $table->integer('quantity')->default(1);
            $table->decimal('price_at_purchase', 10, 2);
            $table->string('ukuran_at_purchase')->nullable(); // From your fotos table
            $table->decimal('total_amount', 10, 2);

            $table->string('payment_status')->default('paid'); // Set default to 'paid' for quick demo
            $table->string('transaction_id')->nullable(); // Optional for demo
            $table->string('payment_method')->nullable(); // Optional for demo

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};