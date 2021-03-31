<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_details', function (Blueprint $table) {
            $table->id();
            $table->integer('trade_id');
            $table->float('quantity',8,6)->change;
            $table->float('amount',8,6)->change;
            $table->integer('barcode');
            $table->date('trading_date');
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
        Schema::dropIfExists('trade_details');
    }
}
