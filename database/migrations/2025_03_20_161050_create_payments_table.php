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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // ID thanh toán
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Liên kết với đơn hàng
            $table->decimal('amount', 10, 2); // Số tiền thanh toán
            $table->string('payment_method'); // Phương thức thanh toán (COD, PayPal, VNPay...)
            $table->enum('status', ['Chờ thanh toán', 'Đã thanh toán thành công', 'Thanh toán thất bại', 'Đã hoàn tiền cho khách hàng'])->default('Chờ thanh toán'); // Trạng thái thanh toán
            $table->string('transaction_id')->nullable(); // Mã giao dịch từ cổng thanh toán
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
