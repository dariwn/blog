<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSolicitudperfilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('solicitudperfil', function(Blueprint $table)
		{
			$table->foreign('idperfiles', 'fk_solicitudperfil_perfiles1')->references('idperfiles')->on('perfiles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idsolicitud', 'fk_solicitudperfil_solicitud1')->references('idsolicitud')->on('solicitud')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('solicitudperfil', function(Blueprint $table)
		{
			$table->dropForeign('fk_solicitudperfil_perfiles1');
			$table->dropForeign('fk_solicitudperfil_solicitud1');
		});
	}

}
