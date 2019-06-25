<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrayerrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prayerrequests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->longText('content');
            $table->date('enddate')->nullable();
            $table->date('lastprayedfor')->nullable();
            $table->boolean('answered')->default(false);
            $table->boolean('private')->default(true);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prayerrequests', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('prayerrequests');
    }
}
