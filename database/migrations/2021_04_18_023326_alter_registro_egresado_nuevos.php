<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRegistroEgresadoNuevos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registro_egresado_nuevos', function (Blueprint $table) {
            //
            $table->renameColumn('email_verified_at', 'modificado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registro_egresado_nuevos', function (Blueprint $table) {
            //
            $table->renameColumn('modificado', 'email_verified_at');
        });
    }
}
