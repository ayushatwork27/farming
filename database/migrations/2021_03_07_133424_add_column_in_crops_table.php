<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crops', function (Blueprint $table) {
            $table->string('normal')->nullable();
            $table->string('silver')->nullable();
            $table->string('gold')->nullable();
            $table->text('normal_terms')->nullable()->after('gold');
            $table->text('silver_terms')->nullable()->after('normal_terms');
            $table->text('gold_terms')->nullable()->after('silver_terms');
            $table->boolean('active')->nullable()->default(0)->after('gold_terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crops', function (Blueprint $table) {
            //
        });
    }
}
