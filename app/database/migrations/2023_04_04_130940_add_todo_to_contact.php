<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTodoToContact extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('todo_count')->default(0);
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('todo_count');
        });
    }
}

