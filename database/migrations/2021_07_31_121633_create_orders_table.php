<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
            $table->float('total_price',10,2);
            $table->float('delivery_price',10,2);
            $table->time('order_time',0);
            $table->float('final_price',10,2);
            $table->string('customer_name',45);
            $table->string('customer_lastname',45);
            $table->string('customer_address',100);
            $table->string('customer_city',50);
            $table->string('customer_phone',15);
            $table->string('customer_email',50);
            $table->string('status',45);
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
}
