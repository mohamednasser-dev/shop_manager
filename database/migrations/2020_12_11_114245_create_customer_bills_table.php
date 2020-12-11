<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cust_id')->unsigned()->nullable();
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('set null');
            $table->bigInteger('bill_num');
            $table->float('total');
            $table->float('pay');
            $table->float('remain');
            $table->float('total_profit');
            $table->date('date');
            $table->enum('type',['buy','back'])->default('buy');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('customer_bills');
    }
}
