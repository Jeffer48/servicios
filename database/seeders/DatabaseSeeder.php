<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::unprepared("INSERT INTO grupos(id,grupo,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,'Area',now(),now(),null,'Sistema',null,null),
        (2,'Unidad',now(),now(),null,'Sistema',null,null),
        (3,'Incidente',now(),now(),null,'Sistema',null,null);");

        DB::unprepared("INSERT INTO catalogo(id,id_grupo,descripcion,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,1,'Bomberos',now(),now(),null,'Sistema',null,null),
        (2,1,'Paramédicos',now(),now(),null,'Sistema',null,null),
        (3,1,'Inspección',now(),now(),null,'Sistema',null,null),
        (4,1,'Administrativo',now(),now(),null,'Sistema',null,null),
        (5,2,'PCM 01',now(),now(),null,'Sistema',null,null),
        (6,2,'PCM 04',now(),now(),null,'Sistema',null,null),
        (7,2,'PCM 06',now(),now(),null,'Sistema',null,null),
        (8,2,'PCM 17',now(),now(),null,'Sistema',null,null),
        (9,2,'PCM 21',now(),now(),null,'Sistema',null,null),
        (10,2,'PCM 22',now(),now(),null,'Sistema',null,null),
        (11,2,'PCM 23',now(),now(),null,'Sistema',null,null),
        (12,2,'PCM 1077',now(),now(),null,'Sistema',null,null),
        (13,2,'SUMICH 1370',now(),now(),null,'Sistema',null,null),
        (14,2,'SUMICH 1614',now(),now(),null,'Sistema',null,null),
        (15,2,'BMT 01',now(),now(),null,'Sistema',null,null),
        (16,2,'BMT 02',now(),now(),null,'Sistema',null,null),
        (17,2,'BMT 03',now(),now(),null,'Sistema',null,null),
        (18,2,'BMT 04',now(),now(),null,'Sistema',null,null),
        (19,2,'BMT 05',now(),now(),null,'Sistema',null,null),
        (20,2,'BMT 06',now(),now(),null,'Sistema',null,null),
        (21,2,'BMT 07',now(),now(),null,'Sistema',null,null),
        (22,2,'BMT 08',now(),now(),null,'Sistema',null,null),
        (23,3,'Aborto o Amenaza de Aborto',now(),now(),null,'Sistema',null,null),
        (24,3,'Accidente Vehicular',now(),now(),null,'Sistema',null,null),
        (25,3,'Agresión Física sin Armas',now(),now(),null,'Sistema',null,null),
        (26,3,'Aplastamiento',now(),now(),null,'Sistema',null,null),
        (27,3,'Apoyo a bomberos ',now(),now(),null,'Sistema',null,null),
        (28,3,'Apoyo a Municipios',now(),now(),null,'Sistema',null,null),
        (29,3,'Atropellado',now(),now(),null,'Sistema',null,null),
        (30,3,'Caída',now(),now(),null,'Sistema',null,null),
        (31,3,'Choque Vehicular',now(),now(),null,'Sistema',null,null),
        (32,3,'Cobertura de Evento',now(),now(),null,'Sistema',null,null),
        (33,3,'Complicaciones Diabeticas',now(),now(),null,'Sistema',null,null),
        (34,3,'Complicaciones Gineco obstétricas',now(),now(),null,'Sistema',null,null),
        (35,3,'Convulsiones',now(),now(),null,'Sistema',null,null),
        (36,3,'Derrape de Moto',now(),now(),null,'Sistema',null,null),
        (37,3,'Desplazamiento',now(),now(),null,'Sistema',null,null),
        (38,3,'Dificultad Respiratoria',now(),now(),null,'Sistema',null,null),
        (39,3,'Dolor Abdominal',now(),now(),null,'Sistema',null,null),
        (40,3,'Falsa Alarma',now(),now(),null,'Sistema',null,null),
        (41,3,'Fuga de Gas',now(),now(),null,'Sistema',null,null),
        (42,3,'Golpes o Riña',now(),now(),null,'Sistema',null,null),
        (43,3,'Herdido por Arma Blanca',now(),now(),null,'Sistema',null,null),
        (44,3,'Herido por Arma Blanca',now(),now(),null,'Sistema',null,null),
        (45,3,'Herido por Proyectil de Arma de Fuego',now(),now(),null,'Sistema',null,null),
        (46,3,'Incendio Bodega',now(),now(),null,'Sistema',null,null),
        (47,3,'Incendio Casa',now(),now(),null,'Sistema',null,null),
        (48,3,'Inspección',now(),now(),null,'Sistema',null,null),
        (49,3,'Intento o Amenaza de Suicidio',now(),now(),null,'Sistema',null,null),
        (50,3,'Intoxicación',now(),now(),null,'Sistema',null,null),
        (51,3,'Menor Lesionada',now(),now(),null,'Sistema',null,null),
        (52,3,'Mordedura de Canino',now(),now(),null,'Sistema',null,null),
        (53,3,'Obstrucción Vía Aérea',now(),now(),null,'Sistema',null,null),
        (54,3,'Persona en Vía Pública',now(),now(),null,'Sistema',null,null),
        (55,3,'Persona Enferma',now(),now(),null,'Sistema',null,null),
        (56,3,'Persona Fallecida',now(),now(),null,'Sistema',null,null),
        (57,3,'Persona Inconsciente',now(),now(),null,'Sistema',null,null),
        (58,3,'Quemaduras',now(),now(),null,'Sistema',null,null),
        (59,3,'Traslado Foraneo',now(),now(),null,'Sistema',null,null),
        (60,3,'Traslado Local',now(),now(),null,'Sistema',null,null),
        (61,3,'Valoración de Detenido',now(),now(),null,'Sistema',null,null),
        (62,3,'Volcadura Vehicular',now(),now(),null,'Sistema',null,null);");
    }
}
