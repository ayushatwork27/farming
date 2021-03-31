<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTradeDetailsChangeQuantityChangeAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_details', function (Blueprint $table) {
            //
            $table->decimal('quantity', 10, 2)->change(); // instead of float
            $table->decimal('amount', 10, 2)->change(); // instead of float

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_details', function (Blueprint $table) {
            //
        });
    }
}
