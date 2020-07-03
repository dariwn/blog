<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEgresadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('egresado', function(Blueprint $table)
		{
			$table->foreign('estado_id', 'fk_egresado_estado1')->references('idestado')->on('estado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('municipio_id', 'fk_egresado_municipio1')->references('idmunicipio')->on('municipio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pais_id', 'fk_egresado_pais1')->references('idpais')->on('pais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('perfiles_id', 'fk_egresado_perfiles1')->references('idperfiles')->on('perfiles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('genero_id', 'fk_egresado_sexo1')->references('idgenero')->on('sexo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_egresado_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('egresado', function(Blueprint $table)
		{
			$table->dropForeign('fk_egresado_estado1');
			$table->dropForeign('fk_egresado_municipio1');
			$table->dropForeign('fk_egresado_pais1');
			$table->dropForeign('fk_egresado_perfiles1');
			$table->dropForeign('fk_egresado_sexo1');
			$table->dropForeign('fk_egresado_users1');
		});
	}

}
