<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurriculoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curriculo', function(Blueprint $table)
		{
			$table->integer('idcurriculo', true);
			$table->integer('idegresado')->index('fk_curriculo_egresado1_idx');
			$table->longText('ididioma');
			$table->char('habilidades', 100);
			$table->char('especialidad', 60);
			$table->char('escuela', 70);
			$table->text('fecha_inicio', 20);
			$table->text('fecha_termino', 20);
			$table->char('area', 80);
			$table->text('nivel_estudio', 65535);
			$table->text('maestria_doctorado', 65535);
			$table->text('experiencia', 65535);
			$table->text('curso', 65535);
			$table->text('objetivo', 65535);			
			$table->char('duracion', 100);			
			$table->integer('idmunicipio')->index('fk_curriculo_municipio1_idx');
			$table->integer('idestado')->index('fk_curriculo_estado1_idx');
			$table->integer('idperfiles')->index('fk_curriculo_perfiles1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('curriculo');
	}

}
