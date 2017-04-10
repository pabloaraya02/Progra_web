<?php

use Illuminate\Database\Seeder;

class putAdminUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([	
            "name" => "Admin",
            "password" => bcrypt("12345"),
            "email" => "admin@admin.com",
            "sex" => "Male",
            "country" => "Costa Rica"
        ]);
        DB::table('users')->insert([	
            "name" => "Admin2",
            "password" => bcrypt("12345"),
            "email" => "admin2@admin.com",
            "sex" => "Male",
            "country" => "Costa Rica"
        ]);
        DB::table('users')->insert([    
            "name" => "Estudiante Ulate",
            "password" => bcrypt("12345"),
            "email" => "estudiante@estudiante.com",
            "sex" => "Male",
            "country" => "Costa Rica"
        ]);
        
    }
}
