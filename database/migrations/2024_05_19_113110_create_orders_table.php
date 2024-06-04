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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('total_bayar',10,2)->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->enum('status', ['new', 'processing', 'shipped', 'deliverd', 'canceled'])->default('new');
            $table->string('mata_uang')->nullable();
            $table->decimal('jumlah',10,2)->nullable();
            $table->string('shipping_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
