<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::unprepared("INSERT INTO adm_grupos(id,grupo,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,'Tipo de Usuario',now(),now(),null,null,null,null);");

        DB::unprepared("INSERT INTO adm_catalogos(id,id_grupo,clave,descripcion,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,1,null,'Administrador',now(),now(),null,null,null,null),
        (2,1,null,'Operador',now(),now(),null,null,null,null);");
        
        DB::unprepared("INSERT INTO grupos(id,grupo,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,'Área',now(),now(),null,null,null,null),
        (2,'Unidad',now(),now(),null,null,null,null),
        (3,'Incidente',now(),now(),null,null,null,null),
        (4,'Turno',now(),now(),null,null,null,null),
        (5,'Servicio',now(),now(),null,null,null,null),
        (6,'Localidades',now(),now(),null,null,null,null),
        (7,'Lugares',now(),now(),null,null,null,null),
        (8,'Prioridad',now(),now(),null,null,null,null),
        (9,'Sexo',now(),now(),null,null,null,null),
        (10,'Apoyo',now(),now(),null,null,null,null),
        (11,'Destino',now(),now(),null,null,null,null),
        (12,'Hospital',now(),now(),null,null,null,null),
        (13,'Personal',now(),now(),null,null,null,null),
        (14,'Reportante',now(),now(),null,null,null,null);");

        DB::unprepared("INSERT INTO catalogos(id,id_grupo,clave,descripcion,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,1,null,'Bomberos',now(),now(),null,null,null,null),
        (2,1,null,'Paramédicos',now(),now(),null,null,null,null),
        (3,1,null,'Inspección',now(),now(),null,null,null,null),
        (4,1,null,'Administrativo',now(),now(),null,null,null,null),
        (5,2,null,'PCM 01',now(),now(),null,null,null,null),
        (6,2,null,'PCM 04',now(),now(),null,null,null,null),
        (7,2,null,'PCM 06',now(),now(),null,null,null,null),
        (8,2,null,'PCM 17',now(),now(),null,null,null,null),
        (9,2,null,'PCM 21',now(),now(),null,null,null,null),
        (10,2,null,'PCM 22',now(),now(),null,null,null,null),
        (11,2,null,'PCM 23',now(),now(),null,null,null,null),
        (12,2,null,'PCM 1077',now(),now(),null,null,null,null),
        (13,2,null,'SUMICH 1370',now(),now(),null,null,null,null),
        (14,2,null,'SUMICH 1614',now(),now(),null,null,null,null),
        (15,2,null,'BMT 01',now(),now(),null,null,null,null),
        (16,2,null,'BMT 02',now(),now(),null,null,null,null),
        (17,2,null,'BMT 03',now(),now(),null,null,null,null),
        (18,2,null,'BMT 04',now(),now(),null,null,null,null),
        (19,2,null,'BMT 05',now(),now(),null,null,null,null),
        (20,2,null,'BMT 06',now(),now(),null,null,null,null),
        (21,3,null,'Aborto o Amenaza de Aborto',now(),now(),null,null,null,null),
        (22,3,null,'Accidente Vehicular',now(),now(),null,null,null,null),
        (23,3,null,'Agresión Física sin Armas',now(),now(),null,null,null,null),
        (24,3,null,'Aplastamiento',now(),now(),null,null,null,null),
        (25,3,null,'Apoyo a bomberos ',now(),now(),null,null,null,null),
        (26,3,null,'Apoyo a Municipios',now(),now(),null,null,null,null),
        (27,3,null,'Atropellado',now(),now(),null,null,null,null),
        (28,3,null,'Caída',now(),now(),null,null,null,null),
        (29,3,null,'Choque Vehicular',now(),now(),null,null,null,null),
        (30,3,null,'Cobertura de Evento',now(),now(),null,null,null,null),
        (31,3,null,'Complicaciones Diabeticas',now(),now(),null,null,null,null),
        (32,3,null,'Complicaciones Gineco obstétricas',now(),now(),null,null,null,null),
        (33,3,null,'Convulsiones',now(),now(),null,null,null,null),
        (34,3,null,'Derrape de Moto',now(),now(),null,null,null,null),
        (35,3,null,'Desplazamiento',now(),now(),null,null,null,null),
        (36,3,null,'Dificultad Respiratoria',now(),now(),null,null,null,null),
        (37,3,null,'Dolor Abdominal',now(),now(),null,null,null,null),
        (38,3,null,'Falsa Alarma',now(),now(),null,null,null,null),
        (39,3,null,'Fuga de Gas',now(),now(),null,null,null,null),
        (40,3,null,'Golpes o Riña',now(),now(),null,null,null,null),
        (41,3,null,'Herdido por Arma Blanca',now(),now(),null,null,null,null),
        (42,3,null,'Herido por Arma Blanca',now(),now(),null,null,null,null),
        (43,3,null,'Herido por Proyectil de Arma de Fuego',now(),now(),null,null,null,null),
        (44,3,null,'Incendio Bodega',now(),now(),null,null,null,null),
        (45,3,null,'Incendio Casa',now(),now(),null,null,null,null),
        (46,3,null,'Inspección',now(),now(),null,null,null,null),
        (47,3,null,'Intento o Amenaza de Suicidio',now(),now(),null,null,null,null),
        (48,3,null,'Intoxicación',now(),now(),null,null,null,null),
        (49,3,null,'Menor Lesionada',now(),now(),null,null,null,null),
        (50,3,null,'Mordedura de Canino',now(),now(),null,null,null,null),
        (51,3,null,'Obstrucción Vía Aérea',now(),now(),null,null,null,null),
        (52,3,null,'Persona en Vía Pública',now(),now(),null,null,null,null),
        (53,3,null,'Persona Enferma',now(),now(),null,null,null,null),
        (54,3,null,'Persona Fallecida',now(),now(),null,null,null,null),
        (55,3,null,'Persona Inconsciente',now(),now(),null,null,null,null),
        (56,3,null,'Quemaduras',now(),now(),null,null,null,null),
        (57,3,null,'Traslado Foraneo',now(),now(),null,null,null,null),
        (58,3,null,'Traslado Local',now(),now(),null,null,null,null),
        (59,3,null,'Valoración de Detenido',now(),now(),null,null,null,null),
        (60,3,null,'Volcadura Vehicular',now(),now(),null,null,null,null),
        (61,14,null,'C5i',now(),now(),null,null,null,null),
        (62,14,null,'CRUM',now(),now(),null,null,null,null),
        (63,14,null,'COPOL',now(),now(),null,null,null,null),
        (64,14,null,'CIUDADANIA',now(),now(),null,null,null,null),
        (65,4,null,'A',now(),now(),null,null,null,null),
        (66,4,null,'B',now(),now(),null,null,null,null),
        (67,4,null,'C',now(),now(),null,null,null,null),
        (68,13,null,'OPERADOR PARAMEDICO',now(),now(),null,null,null,null),
        (69,13,null,'BOMBERO/PARAMEDICO',now(),now(),null,null,null,null),
        (70,13,null,'BOMBERO',now(),now(),null,null,null,null),
        (71,13,null,'PARAMÉDICO',now(),now(),null,null,null,null),
        (72,13,null,'SUB JEFE TURNO A',now(),now(),null,null,null,null),
        (73,13,null,'VOLUNTARIO',now(),now(),null,null,null,null),
        (74,13,null,'PARAMEDICO',now(),now(),null,null,null,null),
        (75,13,null,'COMANDANTE OPERATIVO',now(),now(),null,null,null,null),
        (76,13,null,'JEFE TURNO A',now(),now(),null,null,null,null),
        (77,13,null,'DIRECTOR',now(),now(),null,null,null,null),
        (78,13,null,'INSTRUCTOR',now(),now(),null,null,null,null),
        (79,13,null,'PARAMEDICO VOLUNTARIO',now(),now(),null,null,null,null),
        (80,13,null,'SUB JEFE DE TURNO',now(),now(),null,null,null,null),
        (81,13,null,'BOMBERO VOLUNTARIO',now(),now(),null,null,null,null),
        (82,5,null,'ABANDERAMIENTO',now(),now(),null,null,null,null),
        (83,5,null,'ABORTO O AMENAZA DE ABORTO',now(),now(),null,null,null,null),
        (84,5,null,'ACCIDENTE VEHICULAR',now(),now(),null,null,null,null),
        (85,5,null,'AGRESIÓN FÍSICA SIN ARMAS',now(),now(),null,null,null,null),
        (86,5,null,'AHOGAMIENTO',now(),now(),null,null,null,null),
        (87,5,null,'AMPUTACIÓN',now(),now(),null,null,null,null),
        (88,5,null,'APLASTAMIENTO',now(),now(),null,null,null,null),
        (89,5,null,'ÁRBOL CAÍDO',now(),now(),null,null,null,null),
        (90,5,null,'ATROPELLADO',now(),now(),null,null,null,null),
        (91,5,null,'CABLES CAÍDOS',now(),now(),null,null,null,null),
        (92,5,null,'CAÍDA DE ALTURA MAYOR A LA PROPIA',now(),now(),null,null,null,null),
        (93,5,null,'CAÍDA DE ESCALERAS',now(),now(),null,null,null,null),
        (94,5,null,'CAÍDA DE MENOR ALTURA',now(),now(),null,null,null,null),
        (95,5,null,'CAÍDA DE SU PROPIA ALTURA',now(),now(),null,null,null,null),
        (96,5,null,'CAÍDA DE VEHÍCULO EN MOVIMIENTO',now(),now(),null,null,null,null),
        (97,5,null,'CAPACITACIÓN',now(),now(),null,null,null,null),
        (98,5,null,'CAPTURA DE REPTILES',now(),now(),null,null,null,null),
        (99,5,null,'CAPTURA O RESCATE DE ANIMALES',now(),now(),null,null,null,null),
        (100,5,null,'COBERTURA DE EVENTO',now(),now(),null,null,null,null),
        (101,5,null,'COLUMNA DE HUMO',now(),now(),null,null,null,null),
        (102,5,null,'COMPLICACIONES DIABETICAS',now(),now(),null,null,null,null),
        (103,5,null,'COMPLICACIONES GINECO OBSTÉTRICAS',now(),now(),null,null,null,null),
        (104,5,null,'CONVULSIONES',now(),now(),null,null,null,null),
        (105,5,null,'DERRAME DE COMBUSTIBLE',now(),now(),null,null,null,null),
        (106,5,null,'DERRAPE DE MOTO',now(),now(),null,null,null,null),
        (107,5,null,'DIFICULTAD RESPIRATORIA',now(),now(),null,null,null,null),
        (108,5,null,'DOLOR ABDOMINAL',now(),now(),null,null,null,null),
        (109,5,null,'ELECTROCUCIÓN',now(),now(),null,null,null,null),
        (110,5,null,'ENJAMBRE DE ABEJAS',now(),now(),null,null,null,null),
        (111,5,null,'ENJAMBRE DE AVISPAS',now(),now(),null,null,null,null),
        (112,5,null,'EVACUACIÓN',now(),now(),null,null,null,null),
        (113,5,null,'EXPLOSIÓN',now(),now(),null,null,null,null),
        (114,5,null,'FLAMAZO',now(),now(),null,null,null,null),
        (115,5,null,'FUGA DE GAS',now(),now(),null,null,null,null),
        (116,5,null,'GOLPES O RIÑA',now(),now(),null,null,null,null),
        (117,5,null,'HERIDO POR ARMA BLANCA',now(),now(),null,null,null,null),
        (118,5,null,'HERIDO POR PROYECTIL DE ARMA DE FUEGO',now(),now(),null,null,null,null),
        (119,5,null,'INCIDENTE CON MATERIALES PELIGROSOS',now(),now(),null,null,null,null),
        (120,5,null,'INCENDIO DE ÁRBOL',now(),now(),null,null,null,null),
        (121,5,null,'INCENDIO DE BASURA',now(),now(),null,null,null,null),
        (122,5,null,'INCENDIO DE BODEGA',now(),now(),null,null,null,null),
        (123,5,null,'INCENDIO DE CASA',now(),now(),null,null,null,null),
        (124,5,null,'INCENDIO DE COMERCIO',now(),now(),null,null,null,null),
        (125,5,null,'INCENDIO FORESTAL',now(),now(),null,null,null,null),
        (126,5,null,'INCENDIO DE LLANTAS',now(),now(),null,null,null,null),
        (127,5,null,'INCENDIO DE PACAS',now(),now(),null,null,null,null),
        (128,5,null,'INCENDIO DE PASTIZAL',now(),now(),null,null,null,null),
        (129,5,null,'INCENDIO DE RELLENO SANITARIO',now(),now(),null,null,null,null),
        (130,5,null,'INCENDIO INDUSTRIAL',now(),now(),null,null,null,null),
        (131,5,null,'INCENDIO VEHICULAR',now(),now(),null,null,null,null),
        (132,5,null,'INTENTO O AMENAZA DE SUICIDIO',now(),now(),null,null,null,null),
        (133,5,null,'INTOXICACIÓN POR ALIMENTOS',now(),now(),null,null,null,null),
        (134,5,null,'INTOXICACIÓN POR MEDICAMENTO',now(),now(),null,null,null,null),
        (135,5,null,'INTOXICACIÓN POR QUÍMICO',now(),now(),null,null,null,null),
        (136,5,null,'MORDEDURA DE ARAÑA',now(),now(),null,null,null,null),
        (137,5,null,'MORDEDURA DE CANINO',now(),now(),null,null,null,null),
        (138,5,null,'MORDEDURA DE SERPIENTE',now(),now(),null,null,null,null),
        (139,5,null,'OBSTRUCCIÓN VÍA AÉREA',now(),now(),null,null,null,null),
        (140,5,null,'OLOR A GAS',now(),now(),null,null,null,null),
        (141,5,null,'PARTO FORTUITO',now(),now(),null,null,null,null),
        (142,5,null,'PERSONA ENFERMA',now(),now(),null,null,null,null),
        (143,5,null,'PERSONA FALLECIDA',now(),now(),null,null,null,null),
        (144,5,null,'PERSONA INCONSCIENTE',now(),now(),null,null,null,null),
        (145,5,null,'PERSONA TIRADA EN VÍA PÚBLICA',now(),now(),null,null,null,null),
        (146,5,null,'PICADURA DE ABEJA',now(),now(),null,null,null,null),
        (147,5,null,'PICADURA DE ALACRÁN',now(),now(),null,null,null,null),
        (148,5,null,'PICADURA DE ANIMAL',now(),now(),null,null,null,null),
        (149,5,null,'PREVENCIÓN',now(),now(),null,null,null,null),
        (150,5,null,'QUEMADURAS',now(),now(),null,null,null,null),
        (151,5,null,'SIMULACRO',now(),now(),null,null,null,null),
        (152,5,null,'TRASLADO',now(),now(),null,null,null,null),
        (153,5,null,'VALORACIÓN DE DETENIDO',now(),now(),null,null,null,null),
        (154,5,null,'VIOLENCIA FAMILIAR',now(),now(),null,null,null,null),
        (155,5,null,'VOLCADURA VEHICULAR',now(),now(),null,null,null,null),
        (156,6,null,'ÁLVARO OBREGÓN',now(),now(),null,null,null,null),
        (157,6,null,'AMPLIACIÓN JAMAICA',now(),now(),null,null,null,null),
        (158,6,null,'ARÍNDEO',now(),now(),null,null,null,null),
        (159,6,null,'AUTOPISTA CUITZEO - PATZCUARO',now(),now(),null,null,null,null),
        (160,6,null,'AUTOPISTA CUITZEO - SALAMANCA',now(),now(),null,null,null,null),
        (161,6,null,'AUTOPISTA DE OCCIDENTE',now(),now(),null,null,null,null),
        (162,6,null,'BARRIO DE LA CRUZ',now(),now(),null,null,null,null),
        (163,6,null,'BARRIO LA DOCTRINA',now(),now(),null,null,null,null),
        (164,6,null,'BARRIO SAN MARCOS',now(),now(),null,null,null,null),
        (165,6,null,'BELLAVISTA',now(),now(),null,null,null,null),
        (166,6,null,'CAMPESTRE',now(),now(),null,null,null,null),
        (167,6,null,'CAMPESTRE TARÍMBARO',now(),now(),null,null,null,null),
        (168,6,null,'CAÑADA DE LA MAGDALENA',now(),now(),null,null,null,null),
        (169,6,null,'CAÑADA DE LOS SAUCES',now(),now(),null,null,null,null),
        (170,6,null,'CAÑADA DEL HERRERO',now(),now(),null,null,null,null),
        (171,6,null,'CARRETERA MORELIA-SALAMANCA',now(),now(),null,null,null,null),
        (172,6,null,'CARRETERA MORELIA-ZINAPECUARO',now(),now(),null,null,null,null),
        (173,6,null,'CELAYA, GUANAJUATO',now(),now(),null,null,null,null),
        (174,6,null,'CHARO',now(),now(),null,null,null,null),
        (175,6,null,'CERRO DE LAS TUNAS',now(),now(),null,null,null,null),
        (176,6,null,'CHUCANDIRO',now(),now(),null,null,null,null),
        (177,6,null,'CLUB CAMPESTRE ERANDENI',now(),now(),null,null,null,null),
        (178,6,null,'COLINAS DE LA PALMA',now(),now(),null,null,null,null),
        (179,6,null,'COLONIA CUEVA DEL COYOTE',now(),now(),null,null,null,null),
        (180,6,null,'COLONIA EL PARAISO',now(),now(),null,null,null,null),
        (181,6,null,'COLONIA INDEPENDENCIA',now(),now(),null,null,null,null),
        (182,6,null,'COLONIA MIGUEL HIDALGO',now(),now(),null,null,null,null),
        (183,6,null,'COLONIA SAN MIGUEL',now(),now(),null,null,null,null),
        (184,6,null,'COLONIA SAN MIGUEL ARCANGEL',now(),now(),null,null,null,null),
        (185,6,null,'COLONIA VERÓNICA LÓPEZ',now(),now(),null,null,null,null),
        (186,6,null,'CONJUNTO HABITACIONAL EL TRÉBOL',now(),now(),null,null,null,null),
        (187,6,null,'COPANDARO',now(),now(),null,null,null,null),
        (188,6,null,'COTZIO',now(),now(),null,null,null,null),
        (189,6,null,'CUITZEO',now(),now(),null,null,null,null),
        (190,6,null,'CUPARÁTARO',now(),now(),null,null,null,null),
        (191,6,null,'CUTO DEL PORVENIR',now(),now(),null,null,null,null),
        (192,6,null,'EJIDO JESÚS DEL MONTE',now(),now(),null,null,null,null),
        (193,6,null,'EL CARRIZAL',now(),now(),null,null,null,null),
        (194,6,null,'EL COLEGIO',now(),now(),null,null,null,null),
        (195,6,null,'EL CUITZILLO CHICO',now(),now(),null,null,null,null),
        (196,6,null,'EL CUITZILLO GRANDE',now(),now(),null,null,null,null),
        (197,6,null,'EL CURIRO',now(),now(),null,null,null,null),
        (198,6,null,'EL ESTABLO (HACIENDA DEL INGENIERO CRUZ GARCÍA)',now(),now(),null,null,null,null),
        (199,6,null,'EL JAGÜEY',now(),now(),null,null,null,null),
        (200,6,null,'EL LOMETÓN',now(),now(),null,null,null,null),
        (201,6,null,'EL PEDREGAL',now(),now(),null,null,null,null),
        (202,6,null,'EL PINO',now(),now(),null,null,null,null),
        (203,6,null,'EL PUESTO',now(),now(),null,null,null,null),
        (204,6,null,'EL VALLADO',now(),now(),null,null,null,null),
        (205,6,null,'EL ZAPOTE',now(),now(),null,null,null,null),
        (206,6,null,'EX-HACIENDA DE GUADALUPE',now(),now(),null,null,null,null),
        (207,6,null,'EX-HACIENDA DE URUÉTARO',now(),now(),null,null,null,null),
        (208,6,null,'FELIPE ÁNGELES',now(),now(),null,null,null,null),
        (209,6,null,'FRACC ERENDENI',now(),now(),null,null,null,null),
        (210,6,null,'FRACC FRANCISCO VILLA (EL PELLISCO)',now(),now(),null,null,null,null),
        (211,6,null,'FRACC REAL HACIENDA',now(),now(),null,null,null,null),
        (212,6,null,'FRACCIONAMIENTO BUGAMBILIAS',now(),now(),null,null,null,null),
        (213,6,null,'FRACCIONAMIENTO CAMPESTRE MONARCA',now(),now(),null,null,null,null),
        (214,6,null,'FRACCIONAMIENTO EL PRADO',now(),now(),null,null,null,null),
        (215,6,null,'FRACCIONAMIENTO EL SENDERO',now(),now(),null,null,null,null),
        (216,6,null,'FRACCIONAMIENTO ERANDENI',now(),now(),null,null,null,null),
        (217,6,null,'FRACCIONAMIENTO ERANDENI I, II Y IV',now(),now(),null,null,null,null),
        (218,6,null,'FRACCIONAMIENTO EX-HACIENDA SAN JOSÉ',now(),now(),null,null,null,null),
        (219,6,null,'FRACCIONAMIENTO FRAY BERNABÉ DE J. MONTOYA (LA LADERA)',now(),now(),null,null,null,null),
        (220,6,null,'FRACCIONAMIENTO GALAXIA TARÍMBARO',now(),now(),null,null,null,null),
        (221,6,null,'FRACCIONAMIENTO HACIENDA DEL SOL',now(),now(),null,null,null,null),
        (222,6,null,'FRACCIONAMIENTO HACIENDA EL ENCANTO',now(),now(),null,null,null,null),
        (223,6,null,'FRACCIONAMIENTO JARDÍN MORELIA',now(),now(),null,null,null,null),
        (224,6,null,'FRACCIONAMIENTO LA CANTERA',now(),now(),null,null,null,null),
        (225,6,null,'FRACCIONAMIENTO LAS ESPIGAS',now(),now(),null,null,null,null),
        (226,6,null,'FRACCIONAMIENTO LAURELES ERÉNDIRA',now(),now(),null,null,null,null),
        (227,6,null,'FRACCIONAMIENTO LOMA DORADA',now(),now(),null,null,null,null),
        (228,6,null,'FRACCIONAMIENTO METRÓPOLIS II',now(),now(),null,null,null,null),
        (229,6,null,'FRACCIONAMIENTO MIRADOR DE LAS MONARCAS',now(),now(),null,null,null,null),
        (230,6,null,'FRACCIONAMIENTO MIRADOR DE LAS PALMAS',now(),now(),null,null,null,null),
        (231,6,null,'FRACCIONAMIENTO PARAÍSO ESCONDIDO ETAPA I, II Y III',now(),now(),null,null,null,null),
        (232,6,null,'FRACCIONAMIENTO PARQUE SOLE',now(),now(),null,null,null,null),
        (233,6,null,'FRACCIONAMIENTO PASEO DE LOS POETAS',now(),now(),null,null,null,null),
        (234,6,null,'FRACCIONAMIENTO PASEO DEL ERANDENI',now(),now(),null,null,null,null),
        (235,6,null,'FRACCIONAMIENTO PASEO SANTA FE',now(),now(),null,null,null,null),
        (236,6,null,'FRACCIONAMIENTO PASEOS DEL VALLE',now(),now(),null,null,null,null),
        (237,6,null,'FRACCIONAMIENTO PRIVADAS DEL SOL',now(),now(),null,null,null,null),
        (238,6,null,'FRACCIONAMIENTO PUERTA DEL SOL',now(),now(),null,null,null,null),
        (239,6,null,'FRACCIONAMIENTO REAL ERANDENI',now(),now(),null,null,null,null),
        (240,6,null,'FRACCIONAMIENTO SAN JOSÉ DE LA PALMA',now(),now(),null,null,null,null),
        (241,6,null,'FRACCIONAMIENTO TERRANOVA',now(),now(),null,null,null,null),
        (242,6,null,'FRACCIONAMIENTO TERRANOVA II',now(),now(),null,null,null,null),
        (243,6,null,'FRACCIONAMIENTO VALLE REAL',now(),now(),null,null,null,null),
        (244,6,null,'FRACCIONAMIENTO VILLA TZIPEKUA (FRACCIONAMIENTO ERANDENI 3)',now(),now(),null,null,null,null),
        (245,6,null,'FRANCISCO VILLA',now(),now(),null,null,null,null),
        (246,6,null,'GRANJA EL MEZQUITE',now(),now(),null,null,null,null),
        (247,6,null,'GRANJA FRANCISCA (HACIENDA DEL INGENIERO J. ÁNGELES)',now(),now(),null,null,null,null),
        (248,6,null,'HACIENDA DE LA CAPELLANÍA (EL POZO)',now(),now(),null,null,null,null),
        (249,6,null,'HACIENDA LA GOLETA',now(),now(),null,null,null,null),
        (250,6,null,'JAMAICA',now(),now(),null,null,null,null),
        (251,6,null,'KILÓMETRO DOCE',now(),now(),null,null,null,null),
        (252,6,null,'LA CAPELLANA',now(),now(),null,null,null,null),
        (253,6,null,'LA CHARCA',now(),now(),null,null,null,null),
        (254,6,null,'LA COLMENA (EL GARBANZO)',now(),now(),null,null,null,null),
        (255,6,null,'LA CONCEPCIÓN (LA CONCHITA)',now(),now(),null,null,null,null),
        (256,6,null,'LA CORONILLA',now(),now(),null,null,null,null),
        (257,6,null,'LA GRANJA',now(),now(),null,null,null,null),
        (258,6,null,'LA MAGDALENA (EX-HACIENDA DE LA MAGDALENA)',now(),now(),null,null,null,null),
        (259,6,null,'LA MORA',now(),now(),null,null,null,null),
        (260,6,null,'LA MORA (HACIENDA DEL PROFESOR)',now(),now(),null,null,null,null),
        (261,6,null,'LA NORIA',now(),now(),null,null,null,null),
        (262,6,null,'LA PALMA (LAS PALMAS)',now(),now(),null,null,null,null),
        (263,6,null,'LOMA BONITA',now(),now(),null,null,null,null),
        (264,6,null,'LAS CORONILLAS',now(),now(),null,null,null,null),
        (265,6,null,'LOS ÁLAMOS',now(),now(),null,null,null,null),
        (266,6,null,'LOS PINOS',now(),now(),null,null,null,null),
        (267,6,null,'LOS POSTES',now(),now(),null,null,null,null),
        (268,6,null,'LOS RUISEÑORES',now(),now(),null,null,null,null),
        (269,6,null,'MESA DE LA BEMBERICUA',now(),now(),null,null,null,null),
        (270,6,null,'MESÓN NUEVO',now(),now(),null,null,null,null),
        (271,6,null,'MORELIA',now(),now(),null,null,null,null),
        (272,6,null,'ORGANIZACIONES SOCIALES',now(),now(),null,null,null,null),
        (273,6,null,'PALO BLANCO',now(),now(),null,null,null,null),
        (274,6,null,'PEÑA DEL PANAL',now(),now(),null,null,null,null),
        (275,6,null,'PLAN DE AYALA',now(),now(),null,null,null,null),
        (276,6,null,'PLAN DEL CALVARIO',now(),now(),null,null,null,null),
        (277,6,null,'RANCHO DEL SEÑOR TAPIA',now(),now(),null,null,null,null),
        (278,6,null,'RANCHO NUEVO',now(),now(),null,null,null,null),
        (279,6,null,'REAL HACIENDA (METRÓPOLIS)',now(),now(),null,null,null,null),
        (280,6,null,'RINCONADA DE LOS SAUCES',now(),now(),null,null,null,null),
        (281,6,null,'SAN ANDRÉS',now(),now(),null,null,null,null),
        (282,6,null,'SAN BERNABÉ DE LAS CANTERAS',now(),now(),null,null,null,null),
        (283,6,null,'SAN CARLOS',now(),now(),null,null,null,null),
        (284,6,null,'SAN JOSÉ DE LA TRINIDAD',now(),now(),null,null,null,null),
        (285,6,null,'SAN MARCOS',now(),now(),null,null,null,null),
        (286,6,null,'SAN PEDRO DE LOS SAUCES',now(),now(),null,null,null,null),
        (287,6,null,'SANTA ANA DEL ARCO',now(),now(),null,null,null,null),
        (288,6,null,'SANTA CRUZ',now(),now(),null,null,null,null),
        (289,6,null,'SANTA MARÍA',now(),now(),null,null,null,null),
        (290,6,null,'SANTO DOMINGO',now(),now(),null,null,null,null),
        (291,6,null,'SANTO ENTIERRO',now(),now(),null,null,null,null),
        (292,6,null,'TARIMBARO CENTRO',now(),now(),null,null,null,null),
        (293,6,null,'TÉJARO DE LOS IZQUIERDO',now(),now(),null,null,null,null),
        (294,6,null,'URUETARO',now(),now(),null,null,null,null),
        (295,6,null,'VILLA NATURA',now(),now(),null,null,null,null),
        (296,6,null,'VILLA TZIPEKUA',now(),now(),null,null,null,null),
        (297,6,null,'WENCESLAO VICTORIA SOTO',now(),now(),null,null,null,null),
        (298,7,null,'BARANDILLAS',now(),now(),null,null,null,null),
        (299,7,null,'CENTRO DE TRABAJO',now(),now(),null,null,null,null),
        (300,7,null,'CENTRO DEPORTIVO',now(),now(),null,null,null,null),
        (301,7,null,'CENTRO EDUCATIVO',now(),now(),null,null,null,null),
        (302,7,null,'CENTRO RECREATIVO',now(),now(),null,null,null,null),
        (303,7,null,'CLINICA U HOSPITAL',now(),now(),null,null,null,null),
        (304,7,null,'HOGAR',now(),now(),null,null,null,null),
        (305,7,null,'TRANSPORTE PUBLICO O PARTICULAR',now(),now(),null,null,null,null),
        (306,7,null,'VIA PUBLICA',now(),now(),null,null,null,null),
        (307,8,null,'VERDE',now(),now(),null,null,null,null),
        (308,8,null,'AMARILLO',now(),now(),null,null,null,null),
        (309,8,null,'ROJO',now(),now(),null,null,null,null),
        (310,8,null,'NEGRO',now(),now(),null,null,null,null),
        (311,8,null,'NO APLICA',now(),now(),null,null,null,null),
        (312,9,null,'MASCULINO',now(),now(),null,null,null,null),
        (313,9,null,'FEMENINO',now(),now(),null,null,null,null),
        (314,9,null,'SE DESCONOCE ',now(),now(),null,null,null,null),
        (315,9,null,'NO APLICA',now(),now(),null,null,null,null),
        (316,10,null,'ABANDERAMIENTO',now(),now(),null,null,null,null),
        (317,10,null,'ATENCIÓN DEL PARTO',now(),now(),null,null,null,null),
        (318,10,null,'CANCELADO',now(),now(),null,null,null,null),
        (319,10,null,'CAPTURA DE ANIMAL O REPTIL',now(),now(),null,null,null,null),
        (320,10,null,'CONTROL DE DERRAME',now(),now(),null,null,null,null),
        (321,10,null,'CONTROL DE FUGA',now(),now(),null,null,null,null),
        (322,10,null,'CONTROL DE INCENDIO',now(),now(),null,null,null,null),
        (323,10,null,'CURACIÓN',now(),now(),null,null,null,null),
        (324,10,null,'ENTRADA FORZADA',now(),now(),null,null,null,null),
        (325,10,null,'EVACUACIÓN',now(),now(),null,null,null,null),
        (326,10,null,'EVALUACIÓN',now(),now(),null,null,null,null),
        (327,10,null,'FALSA ALARMA',now(),now(),null,null,null,null),
        (328,10,null,'NO APLICA',now(),now(),null,null,null,null),
        (329,10,null,'PREVENCION',now(),now(),null,null,null,null),
        (330,10,null,'RECOMENDACIONES',now(),now(),null,null,null,null),
        (331,10,null,'REMOCIÓN Y ENFRIAMIENTO',now(),now(),null,null,null,null),
        (332,10,null,'RECUPERACIÓN DE CADAVER',now(),now(),null,null,null,null),
        (333,10,null,'RESCATE DE ANIMAL',now(),now(),null,null,null,null),
        (334,10,null,'RESCATE CON CUERDAS',now(),now(),null,null,null,null),
        (335,10,null,'RESCATE EN ESPACIOS CONFINADOS',now(),now(),null,null,null,null),
        (336,10,null,'RESCATE CON EQUIPO HIDRAULICO',now(),now(),null,null,null,null),
        (337,10,null,'RETIRO DE ENJAMBRE',now(),now(),null,null,null,null),
        (338,10,null,'RETIRO DE ESCOMBRO',now(),now(),null,null,null,null),
        (339,10,null,'SOPORTE VITAL AVANZADO',now(),now(),null,null,null,null),
        (340,10,null,'SOPORTE VITAL BASICO',now(),now(),null,null,null,null),
        (341,10,null,'SOPORTE VITAL MEDIO',now(),now(),null,null,null,null),
        (342,10,null,'TOMA DE SIGNOS VITALES',now(),now(),null,null,null,null),
        (343,10,null,'VALORACION',now(),now(),null,null,null,null),
        (344,11,null,'CANCELADO',now(),now(),null,null,null,null),
        (345,11,null,'EN LA UBICACIÓN',now(),now(),null,null,null,null),
        (346,11,null,'NO APLICA',now(),now(),null,null,null,null),
        (347,11,null,'SIN LESIONADOS',now(),now(),null,null,null,null),
        (348,11,null,'TRASLADO A HOSPITAL',now(),now(),null,null,null,null),
        (349,11,null,'TRASLADO A SU DOMICILIO',now(),now(),null,null,null,null),
        (350,12,null,'CENTRO DE SALUD TARIMBARO',now(),now(),null,null,null,null),
        (351,12,null,'CENTRO DE SALUD URUETARO',now(),now(),null,null,null,null),
        (352,12,null,'CENTRO DE SALUD TEJARO',now(),now(),null,null,null,null),
        (353,12,null,'CLINICA LOS PINOS',now(),now(),null,null,null,null),
        (354,12,null,'CLINICA MEDICA REAL',now(),now(),null,null,null,null),
        (355,12,null,'CLINICA RENACIMIENTO',now(),now(),null,null,null,null),
        (356,12,null,'CLINICA SAN MARCOS',now(),now(),null,null,null,null),
        (357,12,null,'H. CARMEN ELENA',now(),now(),null,null,null,null),
        (358,12,null,'H. CIVIL',now(),now(),null,null,null,null),
        (359,12,null,'H. DE DIOS',now(),now(),null,null,null,null),
        (360,12,null,'H. DE LA MUJER',now(),now(),null,null,null,null),
        (361,12,null,'H. DE LA SALUD',now(),now(),null,null,null,null),
        (362,12,null,'H. FEMEDI',now(),now(),null,null,null,null),
        (363,12,null,'H. HISPANO',now(),now(),null,null,null,null),
        (364,12,null,'H. INFANTIL',now(),now(),null,null,null,null),
        (365,12,null,'H. INOVA',now(),now(),null,null,null,null),
        (366,12,null,'H. ANGELES',now(),now(),null,null,null,null),
        (367,12,null,'H. MEMORIAL',now(),now(),null,null,null,null),
        (368,12,null,'H. NUEVA ESPAÑA',now(),now(),null,null,null,null),
        (369,12,null,'H. SAN MIGUEL',now(),now(),null,null,null,null),
        (370,12,null,'H. STAR MEDICA',now(),now(),null,null,null,null),
        (371,12,null,'H. VICTORIA',now(),now(),null,null,null,null),
        (372,12,null,'IMSS CAMELINAS',now(),now(),null,null,null,null),
        (373,12,null,'IMSS CHARO',now(),now(),null,null,null,null),
        (374,12,null,'IMSS METROPOLIS',now(),now(),null,null,null,null),
        (375,12,null,'ISSSTE',now(),now(),null,null,null,null),
        (376,12,null,'NO APLICA',now(),now(),null,null,null,null),
        (377,12,null,'SANATORIO CUAUTLA',now(),now(),null,null,null,null),
        (378,12,null,'SANATORIO LA LUZ',now(),now(),null,null,null,null);");

        DB::unprepared("INSERT INTO personal(id,id_tipo,id_turno,nombre,apellido_p,apellido_m,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,68,65,'AGUSTIN','SIXTOS','ALVAREZ',now(),now(),null,null,null,null),
        (2,68,65,'ALBERT CRISTOFER','SERRANO','PRADO',now(),now(),null,null,null,null),
        (3,69,65,'ALFREDO ITZIHUAPE','EQUIHUA','TINOCO',now(),now(),null,null,null,null),
        (4,70,65,'AMERICO','VILLASEÑOR','GARCIA',now(),now(),null,null,null,null),
        (5,70,65,'ANDRES','MARTINEZ','AGUADO',now(),now(),null,null,null,null),
        (6,70,65,'ANTONIO','ARAUJO','LOPEZ',now(),now(),null,null,null,null),
        (7,70,65,'AZUCENA','GARCIA','CEJA',now(),now(),null,null,null,null),
        (8,71,65,'BRANDON','CORONA','HERRERA',now(),now(),null,null,null,null),
        (9,70,65,'BRIAN FRANCISCO','LOPEZ','HEREDIA',now(),now(),null,null,null,null),
        (10,70,65,'CARLOS','CHAVEZ','CRUZ',now(),now(),null,null,null,null),
        (11,70,65,'CESAR','MAGAÑA','CONTRERAS',now(),now(),null,null,null,null),
        (12,72,65,'CRISTAL','RAMIREZ','AVALOS',now(),now(),null,null,null,null),
        (13,73,65,'DANIEL DE GUADALUPE','HERNÁNDEZ','VAQUERO',now(),now(),null,null,null,null),
        (14,74,65,'DIANA FATIMA','DIMAS','ALVARADO',now(),now(),null,null,null,null),
        (15,74,65,'DULCE MARIA GUADALUPE','CHAVEZ','CORTES',now(),now(),null,null,null,null),
        (16,74,65,'DYHAN','ZUÑIGA','RAMIREZ',now(),now(),null,null,null,null),
        (17,74,65,'EDGAR','AYALA','CARDENAS',now(),now(),null,null,null,null),
        (18,68,65,'EDGAR','ZAMUDIO','ALEJANDRE',now(),now(),null,null,null,null),
        (19,70,65,'ERICK','CORONA','HERRERA',now(),now(),null,null,null,null),
        (20,68,65,'ESMERALDA','AVALOS','MEDINA',now(),now(),null,null,null,null),
        (21,74,65,'EVELYN','TORRES','REYES',now(),now(),null,null,null,null),
        (22,74,65,'FARID GIOVANNI','ZEPEDA','AYALA',now(),now(),null,null,null,null),
        (23,75,65,'FILIBERTO','ROMERO','MORENO',now(),now(),null,null,null,null),
        (24,74,65,'GERARDO GABRIEL','CAMPOS','PADILLA',now(),now(),null,null,null,null),
        (25,70,65,'GILBERTO','LOZANO','DOMINGUEZ',now(),now(),null,null,null,null),
        (26,74,65,'GUADALUPE','VILLA','SANCHEZ',now(),now(),null,null,null,null),
        (27,74,65,'ITZEL','SANCHEZ','PIÑA',now(),now(),null,null,null,null),
        (28,74,65,'JANETH ESMERALDA','TRIGUEROS','REYES',now(),now(),null,null,null,null),
        (29,68,65,'JESSICA RUBI','MURILLO','ABREGO',now(),now(),null,null,null,null),
        (30,70,65,'JONATHAN','MUÑOZ','ALVAREZ',now(),now(),null,null,null,null),
        (31,70,65,'JOSE','JIMENEZ','PANIAGUA',now(),now(),null,null,null,null),
        (32,70,65,'JOSE OCTAVIO','LOPEZ','RODRIGUEZ',now(),now(),null,null,null,null),
        (33,70,65,'JUAN ABRAHAM','BARRERA','VEGA',now(),now(),null,null,null,null),
        (34,70,65,'JUAN CARLOS','FRANCO','RIVERA',now(),now(),null,null,null,null),
        (35,70,65,'JUAN GERARDO','LOPEZ','MEDINA',now(),now(),null,null,null,null),
        (36,70,65,'JUAN MANUEL','ORTIZ','SANTOS',now(),now(),null,null,null,null),
        (37,73,65,'KARLA ARACELI','VILLAGOMEZ','RENTERIA',now(),now(),null,null,null,null),
        (38,76,65,'KEVIN','ZETINA','ORTEGA',now(),now(),null,null,null,null),
        (39,70,65,'LETICIA','ARMENDARIZ','LICONA',now(),now(),null,null,null,null),
        (40,70,65,'LUIS FERNANDO','ACEVEDO','LEMUS',now(),now(),null,null,null,null),
        (41,68,65,'LUIS','HERNANDEZ','HERNANDEZ',now(),now(),null,null,null,null),
        (42,74,65,'MARCO ANTONIO','MAYEN','VARGAS',now(),now(),null,null,null,null),
        (43,74,65,'MARGARITA','PARAMO','JIMENEZ',now(),now(),null,null,null,null),
        (44,74,65,'MARIA FERNANDA','GUTIERREZ','ALVAREZ',now(),now(),null,null,null,null),
        (45,77,65,'MARIA GUADALUPE','OROZCO','ALVAREZ',now(),now(),null,null,null,null),
        (46,70,65,'MARIA','VEGA','VARGAS',now(),now(),null,null,null,null),
        (47,68,65,'MARIO ENRIQUE','EQUIHUA','TINOCO',now(),now(),null,null,null,null),
        (48,74,65,'MARTIN','CHAVEZ','LUNA',now(),now(),null,null,null,null),
        (49,78,65,'MAURICIO','QUINTANA','ZAVALA',now(),now(),null,null,null,null),
        (50,74,65,'MIRIAM ANA KAREN','GODINEZ','VEGA',now(),now(),null,null,null,null),
        (51,68,65,'MOISES ARTURO','PEREZ','ALCANTARA',now(),now(),null,null,null,null),
        (52,68,65,'MONICA','VAZQUEZ','SILVA',now(),now(),null,null,null,null),
        (53,74,65,'NO APLICA','','',now(),now(),null,null,null,null),
        (54,79,65,'OSCAR','VILLALOBOS','CARRILLO',now(),now(),null,null,null,null),
        (55,80,65,'RAFAEL ANTONIO','PEREZ','HERNANDEZ',now(),now(),null,null,null,null),
        (56,74,65,'REYNA','AYALA','DURAN',now(),now(),null,null,null,null),
        (57,74,65,'RUBEN OMAR','BERNABE','GAYTAN',now(),now(),null,null,null,null),
        (58,74,65,'SAUL','LEMUS','SANTOYO',now(),now(),null,null,null,null),
        (59,74,65,'TANIA ALEXANDRA','ARELLANO','RODRIGUEZ',now(),now(),null,null,null,null),
        (60,81,65,'TOMASA CRISTINA','DURAN','NAVA',now(),now(),null,null,null,null),
        (61,73,65,'YEISI ANGELICA','CHAVEZ','CORTES',now(),now(),null,null,null,null),
        (62,73,65,'ZAIRA','DELGADO','VELAZQUEZ',now(),now(),null,null,null,null),
        (63,73,65,'ESDRAS JOAQUIN','GONZALEZ','PEREZ',now(),now(),null,null,null,null),
        (64,73,65,'JORGE','MANZO','GABRIEL',now(),now(),null,null,null,null),
        (65,73,65,'MIGUEL','ARMENDARIZ','GONZALEZ',now(),now(),null,null,null,null);");
    }
}
