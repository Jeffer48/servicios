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

        Schema::create('adm_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo')->unsigned()->nullable(false);
            $table->string('nombre',50)->nullable(false);
            $table->string('apellido_p',50)->nullable(true);
            $table->string('apellido_m',50)->nullable(true);
            $table->string('correo')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->integer('created_user')->unsigned()->nullable(true);
            $table->integer('updated_user')->unsigned()->nullable(true);
            $table->integer('deleted_user')->unsigned()->nullable(true);

            $table->foreign('id_tipo')->references('id')->on('adm_catalogos');
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

        Schema::create('reporte_radio', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamp('fecha')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('id_area')->unsigned()->nullable(false);
            $table->integer('id_unidad')->unsigned()->nullable(false);
            $table->integer('id_incidente')->unsigned()->nullable(false);
            $table->string('ubicación',255)->nullable(true);
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
    }

    public function down(): void
    {
        Schema::dropIfExists('adm_user');
        Schema::dropIfExists('adm_catalogos');
        Schema::dropIfExists('adm_grupos');
        Schema::dropIfExists('reporte_radio');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('catalogos');
    }
};
