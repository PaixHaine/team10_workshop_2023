<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class addrdv extends Migration
{
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dateTime('date_rdv')->nullable();
        });
    }

    public function down()
    {
        Schema::table('actions', function (Blueprint $table) {
            $table->dropColumn('date_rdv');
        });
    }
}
