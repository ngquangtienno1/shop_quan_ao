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
        Schema::create('cart', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khách hàng
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Sản phẩm
            $table->foreignId('variant_id')->constrained('product_variants')->onDelete('cascade'); // Biến thể sản phẩm
            $table->integer('quantity')->default(1); // Số lượng sản phẩm
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
