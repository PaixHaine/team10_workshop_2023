<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('firstName')->after('name');
        });
        Schema::table('prospects', function (Blueprint $table) {
            $table->string('firstName')->after('name');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->string('firstName')->after('name');
        });
    }

    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('firstName');
        });
        Schema::table('prospects', function (Blueprint $table) {
            $table->dropColumn('firstName');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('firstName');
        });
    }

};
