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

        DB::unprepared("CREATE VIEW vw_reporte_radio AS
        select 
            rr.id,
            f.folio,
            c0.descripcion unidad,
            c1.descripcion incidente,
            rr.fecha,
            case 
                when au.id_personal is null then concat(au.nombre,' ',au.apellido_p)
                else concat(p.nombre,' ',p.apellido_p)
            end usuario,
            case 
                when e.status = 0 then 'ACTIVO'
                else 'TERMINADO'
            end estado,
            rr.deleted_at
        from reporte_radio rr 
        join etapas e on rr.id = e.id_reporte_radio 
        join folios f on e.id_folio = f.id 
        join adm_user au on rr.created_user = au.id
        join catalogos c0 on rr.id_unidad = c0.id 
        join catalogos c1 on rr.id_incidente = c1.id
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

        DB::unprepared("CREATE VIEW vw_etapas AS
        select 
            e.id,
            rr.fecha,
            rr.id_area,
            c0.descripcion area,
            c1.descripcion unidad,
            c2.descripcion incidente,
            rr.ubicacion radio_ubicacion,
            concat(p0.nombre,' ',p0.apellido_p,' ',p0.apellido_m) radio_operador,
            c3.descripcion reportante,
            c4.descripcion turno,
            e.fecha fecha_captura,
            concat(p1.nombre,' ',p1.apellido_p,' ',p1.apellido_m) operador,
            concat(p2.nombre,' ',p2.apellido_p,' ',p2.apellido_m) jefe,
            concat(p3.nombre,' ',p3.apellido_p,' ',p3.apellido_m) personal_1,
            concat(p4.nombre,' ',p4.apellido_p,' ',p4.apellido_m) personal_2,
            concat(p5.nombre,' ',p5.apellido_p,' ',p5.apellido_m) personal_3,
            concat(p6.nombre,' ',p6.apellido_p,' ',p6.apellido_m) personal_4,
            c5.descripcion servicio,
            c6.descripcion localidad,
            c7.descripcion lugar,
            e.ubicacion etapas_ubicacion,
            f.folio,
            c8.descripcion prioridad,
            e.nombre,
            c9.descripcion sexo,
            e.edad,
            c10.descripcion apoyo,
            c11.descripcion destino,
            c12.descripcion hospital,
            e.desc_evento,
            e.incorporacion,
            e.folio_crum,
            e.folio_c5i,
            case 
                when au.id_personal is null then concat(au.nombre,' ',au.apellido_p)
                else concat(pu.nombre,' ',pu.apellido_p)
            end usuario
        from etapas e
        join reporte_radio rr on e.id_reporte_radio = rr.id
        join catalogos c0 on rr.id_area = c0.id 
        join catalogos c1 on rr.id_unidad = c1.id 
        join catalogos c2 on rr.id_incidente = c2.id
        left join personal p0 on e.id_radio_operador = p0.id
        left join catalogos c3 on e.id_reportante = c3.id 
        left join catalogos c4 on e.id_turno = c4.id
        left join personal p1 on e.id_operador = p1.id
        left join personal p2 on e.id_jefe = p2.id
        left join personal p3 on e.id_personal_1 = p3.id
        left join personal p4 on e.id_personal_2 = p4.id
        left join personal p5 on e.id_personal_3 = p5.id
        left join personal p6 on e.id_personal_4 = p6.id
        left join catalogos c5 on e.id_tipo_servicio = c5.id
        left join catalogos c6 on e.id_localidad = c6.id
        left join catalogos c7 on e.id_lugar = c7.id
        left join folios f on e.id_folio = f.id
        left join catalogos c8 on e.id_prioridad = c8.id
        left join catalogos c9 on e.id_sexo = c9.id 
        left join catalogos c10 on e.id_apoyo = c10.id
        left join catalogos c11 on e.id_destino = c11.id
        left join catalogos c12 on e.id_hospital = c12.id
        left join adm_user au on e.updated_user = au.id
        left join personal pu on au.id_personal = pu.id;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP VIEW IF EXISTS vw_radio_x_etapas;");
        DB::unprepared("DROP VIEW IF EXISTS vw_reporte_radio;");
        DB::unprepared("DROP VIEW IF EXISTS vw_personal;");
        DB::unprepared("DROP VIEW IF EXISTS vw_etapas;");
    }
};
