<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserExtraDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extra_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('father_name')->nullable();
            $table->string('family_member')->nullable();
            $table->string('dob')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('mobile')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('land_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('name_on_bank')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('passbook_image')->nullable();
            $table->string('passport_size_image')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('aadhar_image')->nullable();
            $table->timestamps();
        });

        Schema::table('users',function (Blueprint $table){
             $table->integer('is_active')->default(0);
        });
    }













    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_extra_details');
    }
}
