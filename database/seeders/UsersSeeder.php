<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::unprepared("INSERT INTO adm_user(id,id_tipo,id_personal,nombre,apellido_p,apellido_m,email,password,email_verified_at,created_at,updated_at,deleted_at,created_user,updated_user,deleted_user) VALUES
        (1,1,null,'admin','',null,'admin@email.com','$2y$10\$A0/TClly8inBkdnNGoRD4..ulH.FnZW21AIwtA4bbVOAP3Q3.0Vpm',null,now(),now(),null,null,null,null);");
    }
}
