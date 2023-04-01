<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstName');
            $table->string('email');
            $table->string('phone');
            $table->enum('type', ['b2b', 'b2c']);
            $table->enum('status', ['in_progress', 'dead']);
            $table->enum('genre', ['lead', 'prospect', 'client']);
            $table->boolean('is_interested')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('contacts');
    }
}
