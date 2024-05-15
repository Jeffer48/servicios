<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adm_grupos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('grupo',100)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);
        });

        Schema::create('adm_catalogos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grupo')->unsigned()->nullable(false);
            $table->string('clave',20)->nullable(true);
            $table->string('descripcion',255)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);
            
            $table->foreign('id_grupo')->references('id')->on('adm_grupos');
        });

        Schema::create('grupos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('grupo',100)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);
        });

        Schema::create('catalogos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grupo')->unsigned()->nullable(false);
            $table->string('clave',20)->nullable(true);
            $table->string('descripcion',255)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);
            
            $table->foreign('id_grupo')->references('id')->on('grupos');
        });

        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo')->unsigned()->nullable(false);
            $table->integer('id_turno')->unsigned()->nullable(true);
            $table->string('nombre',50)->nullable(false);
            $table->string('apellido_p',50)->nullable(true);
            $table->string('apellido_m',50)->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);

            $table->foreign('id_tipo')->references('id')->on('catalogos');
            $table->foreign('id_turno')->references('id')->on('catalogos');
        });

        Schema::create('adm_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo')->unsigned()->nullable(false);
            $table->integer('id_personal')->unsigned()->nullable(true);
            $table->string('nombre',50)->nullable(true);
            $table->string('apellido_p',50)->nullable(true);
            $table->string('apellido_m',50)->nullable(true);
            $table->string('username',30)->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);

            $table->foreign('id_tipo')->references('id')->on('adm_catalogos');
        });

        Schema::create('reporte_radio', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_terminado')->default(null)->nullable(true);
            $table->integer('id_area')->unsigned()->nullable(false);
            $table->integer('id_unidad')->unsigned()->nullable(false);
            $table->integer('id_incidente')->unsigned()->nullable(false);
            $table->string('ubicacion',255)->nullable(true);
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);
            
            $table->foreign('id_area')->references('id')->on('catalogos');
            $table->foreign('id_unidad')->references('id')->on('catalogos');
            $table->foreign('id_incidente')->references('id')->on('catalogos');
        });

        Schema::create('folios', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_area')->unsigned()->nullable(false);
            $table->integer('actual_num')->nullable(false);
            $table->string('folio',255)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->foreign('id_area')->references('id')->on('catalogos');
        });

        Schema::create('etapas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_reporte_radio')->unsigned()->nullable(false);
            $table->integer('id_radio_operador')->unsigned()->nullable(true);
            $table->integer('id_reportante')->unsigned()->nullable(true);
            $table->integer('id_turno')->unsigned()->nullable(true);
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_finalizado')->nullable(true)->default(null);
            $table->integer('id_operador')->unsigned()->nullable(true);
            $table->integer('id_jefe')->unsigned()->nullable(true);
            $table->integer('id_personal_1')->unsigned()->nullable(true);
            $table->integer('id_personal_2')->unsigned()->nullable(true);
            $table->integer('id_personal_3')->unsigned()->nullable(true);
            $table->integer('id_personal_4')->unsigned()->nullable(true);
            $table->integer('id_tipo_servicio')->unsigned()->nullable(true);
            $table->integer('id_localidad')->unsigned()->nullable(true);
            $table->integer('id_lugar')->unsigned()->nullable(true);
            $table->string('ubicacion',255)->nullable(true);
            $table->integer('id_folio')->unsigned()->nullable(false);
            $table->integer('id_prioridad')->unsigned()->nullable(true);
            $table->string('nombre',255)->nullable(true);
            $table->integer('id_sexo')->unsigned()->nullable(true);
            $table->integer('edad')->unsigned()->nullable(true);
            $table->integer('id_apoyo')->unsigned()->nullable(true);
            $table->integer('id_destino')->unsigned()->nullable(true);
            $table->integer('id_hospital')->unsigned()->nullable(true);
            $table->string('desc_evento',255)->nullable(true);
            $table->timestamp('incorporacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('folio_crum',255)->nullable(true);
            $table->string('folio_c5i',255)->nullable(true);
            $table->tinyInteger('status')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);

            $table->foreign('id_reporte_radio')->references('id')->on('reporte_radio');
            $table->foreign('id_jefe')->references('id')->on('personal');
            $table->foreign('id_operador')->references('id')->on('personal');
            $table->foreign('id_personal_1')->references('id')->on('personal');
            $table->foreign('id_personal_2')->references('id')->on('personal');
            $table->foreign('id_personal_3')->references('id')->on('personal');
            $table->foreign('id_personal_4')->references('id')->on('personal');
            $table->foreign('id_reportante')->references('id')->on('catalogos');
            $table->foreign('id_turno')->references('id')->on('catalogos');
            $table->foreign('id_tipo_servicio')->references('id')->on('catalogos');
            $table->foreign('id_localidad')->references('id')->on('catalogos');
            $table->foreign('id_lugar')->references('id')->on('catalogos');
            $table->foreign('id_prioridad')->references('id')->on('catalogos');
            $table->foreign('id_sexo')->references('id')->on('catalogos');
            $table->foreign('id_apoyo')->references('id')->on('catalogos');
            $table->foreign('id_destino')->references('id')->on('catalogos');
            $table->foreign('id_hospital')->references('id')->on('catalogos');
            $table->foreign('id_folio')->references('id')->on('folios');
        });

        Schema::create('carga_gasolina', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_jefe')->unsigned()->nullable(true);
            $table->integer('id_operador')->unsigned()->nullable(true);
            $table->integer('id_unidad')->unsigned()->nullable(false);
            $table->integer('kilometraje')->unsigned()->nullable(false);
            $table->float('importe')->unsigned()->nullable(false);
            $table->float('litros')->unsigned()->nullable(false);
            $table->string('folio',50)->nullable(true);
            $table->string('observaciones',255)->nullable(true);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);

            $table->foreign('id_jefe')->references('id')->on('personal');
            $table->foreign('id_operador')->references('id')->on('personal');
            $table->foreign('id_unidad')->references('id')->on('catalogos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adm_user');
        Schema::dropIfExists('adm_catalogos');
        Schema::dropIfExists('adm_grupos');
        Schema::dropIfExists('reporte_radio');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('catalogos');
        Schema::dropIfExists('personal');
        Schema::dropIfExists('carga_gasolina');
    }
};
