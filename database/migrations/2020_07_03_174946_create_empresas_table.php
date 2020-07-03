<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table)
		{
			$table->integer('idempresa', true);
			$table->char('nombre', 30);
			$table->char('names', 20);
			$table->char('apellido_paterno', 40);
			$table->char('apellido_materno', 40);
			$table->char('cargo', 50);
			$table->char('email', 40)->nullable();
			$table->char('rfc', 50);
			$table->char('descripcion', 60)->nullable();
			$table->char('colonia', 50);
			$table->char('calle', 40);
			$table->decimal('numeroexterior', 20, 0);
			$table->decimal('codigo_postal', 20, 0);
			$table->decimal('telefono', 20, 0);
			$table->decimal('numero_cel', 20, 0);
			$table->integer('estado_id')->index('fk_empresa_estado1_idx');
			$table->integer('pais_id')->index('fk_empresa_pais1_idx');
			$table->string('imagen', 50)->nullable()->default('default jpg,png,gif');
			$table->bigInteger('users_id')->unsigned()->index('fk_empresas_users1_idx');
			$table->integer('municipio_id')->index('fk_empresas_municipio1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresas');
	}

}
