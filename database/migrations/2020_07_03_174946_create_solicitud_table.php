<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitud', function(Blueprint $table)
		{
			$table->integer('idsolicitud', true);
			$table->integer('id_empresa')->index('fk_solicitud_empresa1_idx');
			$table->char('nombredelpuesto', 45);
			$table->decimal('salario', 40, 0)->nullable();
			$table->char('horario', 50)->nullable();
			$table->char('edades', 50)->nullable();
			$table->char('descripcion_del_puesto', 50);
			$table->char('tiempo_de_contratacion', 50);
			$table->char('cambio_de_residencia', 60)->nullable();
			$table->char('requisito', 45);
			$table->char('estado_civil', 30)->nullable();
			$table->char('estatus', 25);
			$table->string('respuesta', 5);
			$table->timestamps();
			$table->integer('idsexo')->index('fk_solicitud_sexo1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitud');
	}

}
