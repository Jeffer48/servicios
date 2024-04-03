<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared("CREATE VIEW vw_reporte_radio_st as
        select 
            rr.id,c0.descripcion unidad,
            c1.descripcion incidente,
            c2.descripcion area
        from reporte_radio rr 
        left join catalogos c0 on rr.id_unidad = c0.id
        left join catalogos c1 on rr.id_incidente = c1.id 
        left join catalogos c2 on rr.id_area = c2.id
        where rr.deleted_at is null 
        and rr.id_incidente != 35
        and rr.id not in (
            select id_reporte_radio
            from etapas
            where deleted_at is null
        );");

        DB::unprepared("CREATE VIEW vw_reporte_radio as
        select 
            rr.id,
            c0.descripcion area,
            c1.descripcion unidad,
            c2.descripcion incidente,
            rr.ubicacion,
            rr.fecha,
            case 
                when au.id_personal is null 
                then concat(au.nombre,' ',au.apellido_p)
                else concat(p.nombre,' ',p.apellido_p)
            end usuario,
            rr.deleted_at
        from reporte_radio rr
        left join catalogos c0 on rr.id_area = c0.id
        left join catalogos c1 on rr.id_unidad = c1.id
        left join catalogos c2 on rr.id_incidente = c2.id
        left join adm_user au on rr.created_user = au.id
        left join personal p on au.id_personal = p.id;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS vw_reporte_radio_st;");
        DB::unprepared("DROP VIEW IF EXISTS vw_reporte_radio;");
    }
};
