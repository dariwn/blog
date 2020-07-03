<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMunicipioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('municipio', function(Blueprint $table)
		{
			$table->foreign('estado_idestado', 'fk_municipio_estado1')->references('idestado')->on('estado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('municipio', function(Blueprint $table)
		{
			$table->dropForeign('fk_municipio_estado1');
		});
	}

}
