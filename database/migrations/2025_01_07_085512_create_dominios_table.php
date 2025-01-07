<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dominios', function (Blueprint $table) {
            $table->bigIncrements('id_dominio');
            $table->string('nombre_dominio');
            $table->string('url')->nullable();
            $table->datetime('data_registro')->nullable();
            $table->datetime('data_alta')->nullable();
            $table->datetime('data_baja')->nullable();
            $table->boolean('actiu')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dominios');
    }
};
