<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->boolean('is_interested')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prospects');
    }
}
