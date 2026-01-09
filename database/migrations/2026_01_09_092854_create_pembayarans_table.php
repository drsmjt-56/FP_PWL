<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->string('id_pembayaran', 20)->primary();
            $table->string('nama_penyewa', 100);
            $table->string('no_hp', 20);
            $table->decimal('total_bayar', 12, 2);
            $table->enum('metode_bayar', ['Transfer', 'Cash']);
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->date('tanggal_bayar');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
