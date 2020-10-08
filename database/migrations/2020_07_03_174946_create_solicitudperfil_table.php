<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudperfilTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudperfil', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idsolicitud')->index('fk_solicitudperfil_solicitud1_idx');
			$table->char('idperfiles');
			$table->timestamps();
			// $table->primary(['id','idsolicitud','idperfiles']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitudperfil');
	}

}
