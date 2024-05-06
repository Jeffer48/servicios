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
        DB::unprepared("CREATE VIEW vw_radio_x_etapas as
        select 
            e.id,
            c1.descripcion as unidad,
            f.folio,
            c0.descripcion as area,
            c2.descripcion as incidente,
            rr.fecha,
            e.status,
            e.deleted_at
        from etapas e
        join reporte_radio rr on e.id_reporte_radio = rr.id
        join folios f on e.id_folio = f.id 
        join catalogos c0 on rr.id_area = c0.id
        join catalogos c1 on rr.id_unidad = c1.id
        join catalogos c2 on rr.id_incidente = c2.id;");

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

        DB::unprepared("CREATE VIEW vw_personal as
        select 
            p.id,
            p.nombre,
            p.apellido_p,
            p.apellido_m,
            p.id_tipo,
            c0.descripcion puesto,
            p.id_turno,
            c1.descripcion turno,
            p.deleted_at
        from personal p
        left join catalogos c0 on p.id_tipo = c0.id
        left join catalogos c1 on p.id_turno = c1.id;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS vw_reporte_radio_st;");
        DB::unprepared("DROP VIEW IF EXISTS vw_reporte_radio;");
        DB::unprepared("DROP VIEW IF EXISTS vw_personal;");
    }
};
