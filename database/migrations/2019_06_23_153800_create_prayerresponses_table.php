<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrayerresponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prayerresponses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prayerrequest_id');
            $table->boolean('private')->default(true);
            $table->text('content');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('prayerrequest_id')->references('id')->on('prayerrequests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prayerresponses', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['prayerrequest_id']);
        });
        Schema::dropIfExists('prayerresponses');
    }
}
