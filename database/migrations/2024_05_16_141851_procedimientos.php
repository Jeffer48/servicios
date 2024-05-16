<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("CREATE PROCEDURE crearfolio(in area int)
        begin
            set @anio := (year(curdate())-2000);
            set @ident := '';
            if(area = 1) then set @ident := concat('BMT/',@anio,'/'); end if;
            if(area = 2) then set @ident := concat('PCM/',@anio,'/'); end if;
        
            set @num := (
                select 
                    case 
                        when max(f.actual_num) is null
                        then 1
                        else max(f.actual_num) + 1
                    end sig_numero
                from folios f 
                where f.id_area = area
            );
        
            if(@num < 10) then set @folio := concat(@ident,'000',@num); end if;
            if(@num > 9 && @num < 100) then set @folio := concat(@ident,'00',@num); end if;
            if(@num > 99 && @num < 1000) then set @folio := concat(@ident,'0',@num); end if;
            if(@num > 999) then set @folio := concat(@ident,@num); end if;
        
            insert into folios(id_area,actual_num,folio,created_at,updated_at,deleted_at) values
            (area,@num,@folio,now(),now(),null);
        
            select id,folio
            from folios
            where id_area = area
            order by id desc
            limit 1;
        END;");
    }

    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS crearfolio;");
    }
};
