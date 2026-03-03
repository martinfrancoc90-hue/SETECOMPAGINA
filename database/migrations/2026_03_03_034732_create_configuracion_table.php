<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionTable extends Migration
{
    public function up()
    {
        Schema::create('configuracion', function (Blueprint $table) {
            $table->id();
            $table->string('clave')->unique();
            $table->string('valor')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('configuracion');
    }
}