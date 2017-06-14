<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutomatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->unique();
            $table->string('estados');
            $table->string('eventos');
            $table->string('relacao_estados_eventos');
            $table->string('estado_inicial');
            $table->string('estados_marcados');
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
        Schema::dropIfExists('users');
    }
}
