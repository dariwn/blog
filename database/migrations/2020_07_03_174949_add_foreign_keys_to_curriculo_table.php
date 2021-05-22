<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCurriculoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('curriculo', function(Blueprint $table)
		{
			
			$table->foreign('idegresado', 'fk_curriculo_egresado1')->references('idegresado')->on('egresado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idestado', 'fk_curriculo_estado1')->references('idestado')->on('estado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idjerarquia', 'fk_curriculo_jerarquia1')->references('idjerarquia')->on('jerarquia')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idmunicipio', 'fk_curriculo_municipio1')->references('idmunicipio')->on('municipio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idperfiles', 'fk_curriculo_perfiles1')->references('idperfiles')->on('perfiles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('curriculo', function(Blueprint $table)
		{
			$table->dropForeign('fk_curriculo_Ingles1');
			$table->dropForeign('fk_curriculo_egresado1');
			$table->dropForeign('fk_curriculo_estado1');
			$table->dropForeign('fk_curriculo_jerarquia1');
			$table->dropForeign('fk_curriculo_municipio1');
			$table->dropForeign('fk_curriculo_perfiles1');
		});
	}

}
