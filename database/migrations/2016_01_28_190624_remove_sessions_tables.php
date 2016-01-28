<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSessionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('sessions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('sessions', function(Blueprint $table)
        {
            $table->string('id', 50)->default('')->primary();
            $table->text('payload', 65535)->nullable();
            $table->integer('last_activity')->nullable();
        });
    }
}