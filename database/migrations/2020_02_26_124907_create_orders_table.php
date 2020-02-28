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
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('order_no')->nullable();
            $table->string('name')->nullable();
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->string('comments')->nullable();
            $table->string('due_date')->nullable();
            $table->float('total_amount', 8, 2)->nullable();
            $table->float('amount_paid', 8, 2)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
