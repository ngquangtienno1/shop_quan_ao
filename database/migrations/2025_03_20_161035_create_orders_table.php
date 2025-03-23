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
            $table->id(); // 🛒  (Khóa chính)
            $table->string('order_code')->unique(); // 🏷️ Mã đơn hàng (Duy nhất)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 👤 Mã người dùng (Khóa ngoại đến bảng users)
            $table->string('recipient_name'); // 🏷️ Tên người nhận
            $table->string('recipient_phone'); // 📞 Số điện thoại người nhận
            $table->string('recipient_email'); // 📧 Email người nhận
            $table->foreignId('shipping_method_id')->nullable()->constrained('shipping_methods')->onDelete('set null'); // 🚚 Mã phương thức vận chuyển (Khóa ngoại)
            $table->dateTime('order_date'); // 📅 Ngày đặt hàng
            $table->decimal('total_price', 10, 2); // 💰 Tổng tiền đơn hàng
            $table->text('shipping_address'); // 🏠 Địa chỉ giao hàng
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->onDelete('set null'); // 💳 Mã phương thức thanh toán (Khóa ngoại)
            $table->decimal('shipping_fee', 10, 2)->default(0); // 🚛 Phí vận chuyển
            $table->string('payment_status')->default('Unpaid'); // ✅ Trạng thái thanh toán (Mặc định: Chưa thanh toán)
            $table->enum('order_status', ['Pending', 'Confirmed', 'Processing', 'Shipping', 'Delivered', 'Completed', 'Canceled'])->default('Pending'); // 📦 Trạng thái đơn hàng
            $table->text('note')->nullable(); // 📝 Ghi chú đơn hàng (Có thể để trống)
            $table->timestamps(); // ⏳ Thời gian tạo & cập nhật đơn hàng
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
