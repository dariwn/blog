<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEgresadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('egresado', function(Blueprint $table)
		{
			$table->integer('idegresado', true);
			$table->char('nombres', 100);
			$table->char('apellido_paterno', 60);
			$table->char('apellido_materno', 60);
			$table->char('correo', 40);
			$table->char('domicilio', 50)->nullable();
			$table->char('colonia', 40);
			$table->date('fecha_de_nac')->nullable();
			$table->decimal('numero_cel', 20, 0)->nullable();
			$table->longText('imagen')->nullable();
			$table->integer('pais_id')->index('fk_egresado_pais1_idx');
			$table->integer('estado_id')->index('fk_egresado_estado1_idx');
			$table->integer('municipio_id')->index('fk_egresado_municipio1_idx');
			$table->integer('perfiles_id')->index('fk_egresado_perfiles1_idx');
			$table->integer('genero_id')->index('fk_egresado_sexo1_idx');
			$table->bigInteger('users_id')->unsigned()->index('fk_egresado_users1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('egresado');
	}

}
