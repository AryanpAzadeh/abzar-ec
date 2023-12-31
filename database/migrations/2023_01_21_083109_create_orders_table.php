<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('coupon')->nullable();
            $table->string('tracking_number')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->enum('status' , ['pending' , 'processing' , 'completed' , 'sending' , 'decline'])->default('pending');
            $table->integer('grand_total');
            $table->integer('sub_total');
            $table->integer('shipping');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->string('payment_method')->default('online');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('email');
            $table->string('state');
            $table->string('post_code');
            $table->string('phone');
            $table->string('notes')->nullable();
            $table->string('post_tracking')->nullable();
            $table->string('pay_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
