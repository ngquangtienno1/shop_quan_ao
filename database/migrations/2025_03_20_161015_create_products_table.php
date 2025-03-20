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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sản phẩm
            $table->string('slug')->unique(); // URL thân thiện
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Liên kết danh mục
            $table->decimal('gia_nhap', 10, 2); // Giá nhập
            $table->decimal('gia_ban', 10, 2); // Giá bán
            $table->decimal('gia_khuyen_mai', 10, 2)->nullable(); // Giá khuyến mãi
            $table->integer('stock')->default(0); // Số lượng tồn kho
            $table->tinyInteger('status')->default(0); // 0: Ẩn, 1: Hiển thị
            $table->string('image')->nullable(); // Ảnh sản phẩm
            $table->text('mo_ta_dai')->nullable(); // Mô tả dài
            $table->text('mo_ta_ngan')->nullable(); // Mô tả ngắn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
