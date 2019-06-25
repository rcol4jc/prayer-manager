<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeContentColOnPrayerresponsesToDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prayerresponses', function (Blueprint $table) {
            $table->renameColumn('content','details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prayerresponses', function (Blueprint $table) {
            $table->renameColumn('details','content');
        });
    }
}
