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
            $table->foreignId('user_id')->constrained();
            $table->string('comment');
            $table->foreignId('delivery_method_id')->constrained();
            $table->foreignId('payment_type_id')->constrained();
            $table->unsignedBigInteger('sum')->comment('Sum of order is stored in sum (not tiyn)');
            $table->foreignId('status_id')->default(1)->constrained();
            $table->text('address')->nullable();
            $table->json('products');
            $table->softDeletes();
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
