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
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->decimal('gia_nhap', 10, 2);
            $table->decimal('gia_ban', 10, 2);
            $table->decimal('gia_khuyen_mai', 10, 2)->nullable();
            $table->tinyInteger('status')->default(0);
$table->string('image')->nullable();
            $table->integer('stock')->default(0);
            $table->text('mo_ta_dai')->nullable();
            $table->text('mo_ta_ngan')->nullable();
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
