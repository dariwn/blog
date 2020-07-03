<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empresas', function(Blueprint $table)
		{
			$table->foreign('estado_id', 'fk_empresa_estado1')->references('idestado')->on('estado')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pais_id', 'fk_empresa_pais1')->references('idpais')->on('pais')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('municipio_id', 'fk_empresas_municipio1')->references('idmunicipio')->on('municipio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('users_id', 'fk_empresas_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empresas', function(Blueprint $table)
		{
			$table->dropForeign('fk_empresa_estado1');
			$table->dropForeign('fk_empresa_pais1');
			$table->dropForeign('fk_empresas_municipio1');
			$table->dropForeign('fk_empresas_users1');
		});
	}

}
