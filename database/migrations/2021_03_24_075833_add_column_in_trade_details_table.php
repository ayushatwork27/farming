<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTradeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trade_details', function (Blueprint $table) {
            $table->string('bonus_amount')->default(0)->after('amount');
            $table->string('payment_done_for')->nullable()->after('status_id');
            $table->string('transaction_number')->nullable()->after('payment_done_for');
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
