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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('name', 255); // Tên sản phẩm
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Khóa ngoại tới categories
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->integer('stock')->default(0); // Số lượng tồn kho
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->string('image')->nullable(); // Đường dẫn ảnh sản phẩm
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
