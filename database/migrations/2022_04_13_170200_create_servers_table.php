<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('payload');
            $table->string('ip');
            $table->string('country');
            $table->string('province');
            $table->integer('days');
            $table->integer('price');
            $table->string('type');
            $table->integer('limit');
            $table->string('domain');
            $table->string('vps_user');
            $table->string('vps_passwd');
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
        Schema::dropIfExists('servers');
    }
}
