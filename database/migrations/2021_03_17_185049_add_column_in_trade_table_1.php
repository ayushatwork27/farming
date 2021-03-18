<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTradeTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trades', function (Blueprint $table) {
            $table->integer('installment_number')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('total_trading_amount')->nullable();
            $table->string('bonus_amount')->nullable();
        });

        Schema::table('trade_details', function (Blueprint $table) {
            $table->tinyInteger('status_id')->default(0)->after('trading_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trades', function (Blueprint $table) {
            //
        });
    }
}
