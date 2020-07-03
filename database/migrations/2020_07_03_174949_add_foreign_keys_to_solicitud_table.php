<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSolicitudTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('solicitud', function(Blueprint $table)
		{
			$table->foreign('id_empresa', 'fk_solicitud_empresa1')->references('idempresa')->on('empresas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idsexo', 'fk_solicitud_sexo1')->references('idgenero')->on('sexo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('solicitud', function(Blueprint $table)
		{
			$table->dropForeign('fk_solicitud_empresa1');
			$table->dropForeign('fk_solicitud_sexo1');
		});
	}

}
