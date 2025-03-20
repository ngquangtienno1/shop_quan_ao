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
            $table->id(); // ID đơn hàng
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Khóa ngoại đến bảng users
            $table->decimal('total_price', 10, 2); // Tổng giá trị đơn hàng
            $table->enum('status', ['Chờ xác nhận', 'Đã xác nhận', 'Chờ lấy hàng', 'Chờ giao hàng', 'Đang giao hàng', 'Đã giao hàng', 'Giao hàng thành công'])->default('Chờ xác nhận'); // Trạng thái đơn hàng
            $table->text('shipping_address'); // Địa chỉ giao hàng
            $table->string('payment_method')->default('COD'); // Phương thức thanh toán
            $table->timestamps(); // created_at & updated_at
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
