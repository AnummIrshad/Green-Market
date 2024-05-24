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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('order_id');
    $table->unsignedBigInteger('product_id'); // This column will store the product_id for reference

    $table->string('product_name'); // or use default value if appropriate
    $table->string('product_image_url')->nullable();
    $table->integer('quantity');
    $table->float('product_unit_price');
    $table->text('product_description');
    $table->string('product_vendor_name');

    

    $table->decimal('total', 10, 2);
    $table->timestamps();

    $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    
    $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
