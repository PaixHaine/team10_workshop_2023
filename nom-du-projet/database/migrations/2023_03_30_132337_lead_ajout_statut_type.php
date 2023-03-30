<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->enum('status', ['new', 'in_progress', 'converted', 'dead'])->after('phone');
            $table->enum('type', ['b2b', 'b2c'])->after('phone');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->enum('status', ['new', 'in_progress', 'converted', 'dead'])->after('phone');
            $table->enum('type', ['b2b', 'b2c'])->after('phone');
        });
        Schema::table('prospects', function (Blueprint $table) {
            $table->enum('status', ['new', 'in_progress', 'converted', 'dead'])->after('phone');
            $table->enum('type', ['b2b', 'b2c'])->after('phone');
        });
    }

    public function down()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('type');
        });
        Schema::table('prospects', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('type');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('type');
        });
    }
};
