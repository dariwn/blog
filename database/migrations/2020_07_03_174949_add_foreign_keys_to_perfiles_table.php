<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPerfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('perfiles', function(Blueprint $table)
		{
			$table->foreign('nivel', 'fk_perfiles_nivel1')->references('idnivel')->on('nivel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('perfiles', function(Blueprint $table)
		{
			$table->dropForeign('fk_perfiles_nivel1');
		});
	}

}
