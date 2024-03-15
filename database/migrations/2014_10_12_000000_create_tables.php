<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('catalogo');
        Schema::dropIfExists('reporte_radio');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->string('created_user',45)->nullable(false);
            $table->string('updated_user',45)->nullable(true);
            $table->string('deleted_user',45)->nullable(true);
        });

        Schema::create('grupos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('grupo')->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->string('created_user',45)->nullable(false);
            $table->string('updated_user',45)->nullable(true);
            $table->string('deleted_user',45)->nullable(true);
        });

        Schema::create('catalogos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_grupo')->unsigned()->nullable(false);
            $table->string('descripcion',255)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->string('created_user',45)->nullable(false);
            $table->string('updated_user',45)->nullable(true);
            $table->string('deleted_user',45)->nullable(true);
            
            $table->foreign('id_grupo')->references('id')->on('grupos');
        });

        Schema::create('reporte_radio', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha')->nullable(false);
            $table->time('hora')->nullable(false);
            $table->integer('id_area')->unsigned()->nullable(false);
            $table->integer('id_unidad')->unsigned()->nullable(false);
            $table->integer('id_tipo_incidente')->unsigned()->nullable(false);
            $table->string('ubicacion',255)->nullable(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->string('created_user',45)->nullable(false);
            $table->string('updated_user',45)->nullable(true);
            $table->string('deleted_user',45)->nullable(true);

            $table->foreign('id_area')->references('id')->on('catalogo');
            $table->foreign('id_unidad')->references('id')->on('catalogo');
            $table->foreign('id_tipo_incidente')->references('id')->on('catalogo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('catalogo');
        Schema::dropIfExists('reporte_radio');
    }
};
