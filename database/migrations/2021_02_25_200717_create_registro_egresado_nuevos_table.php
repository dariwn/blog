<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroEgresadoNuevosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_egresado_nuevos', function (Blueprint $table) {
            $table->id();
            $table->decimal('numero_control', 10, 0)->nullable();
            $table->char('nombres', 100);
			$table->char('apellido_paterno', 60);
			$table->char('apellido_materno', 60);
			$table->string('email')->unique();
			$table->dateTime('email_verified_at')->nullable();
            $table->char('Validacion',10);

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
        Schema::dropIfExists('registro_egresado_nuevos');
    }
}
