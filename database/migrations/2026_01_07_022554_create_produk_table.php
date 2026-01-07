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
    Schema::create('produk', function (Blueprint $table) {
        $table->string('id_produk')->primary(); 
        
        $table->string('id_kategori'); 
        $table->string('nama_produk');
        $table->decimal('harga_sewa_perhari', 10, 2); // Pakai decimal/double untuk uang
        $table->integer('stok');
        $table->string('gambar')->nullable(); 
        
        
        $table->timestamps(); // created_at & updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
