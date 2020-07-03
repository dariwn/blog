<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstadoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estado', function(Blueprint $table)
		{
			$table->foreign('pais_idpais', 'fk_estado_pais1')->references('idpais')->on('pais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estado', function(Blueprint $table)
		{
			$table->dropForeign('fk_estado_pais1');
		});
	}

}
