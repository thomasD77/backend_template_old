<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->date('date');
            $table->boolean('approval');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('submissions')->insert([
            'name' => 'Pol Vanhoeve',
            'email' => 'pol.vanhoeve@gmail.com',
            'phone' => '474413669',
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
            'approval' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
