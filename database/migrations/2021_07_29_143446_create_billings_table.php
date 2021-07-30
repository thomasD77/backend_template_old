<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('company')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('streetAddress1');
            $table->string('streetAddress2')->nullable();
            $table->string('city');
            $table->integer('postalCode');
            $table->string('VAT');
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
        Schema::dropIfExists('billings');
    }
}
