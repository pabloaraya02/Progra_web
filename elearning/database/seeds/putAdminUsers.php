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
            "name" => "Pablo Araya",
            "password" => bcrypt("admin1"),
            "email" => "pabloarayane0211@gmail.com",
            "sex" => "Male",
            "country" => "Costa Rica"
        ]);
        DB::table('users')->insert([	
            "name" => "Sergio Villegas",
            "password" => bcrypt("admin1"),
            "email" => "villevillegas2@gmail.com",
            "sex" => "Male",
            "country" => "Costa Rica"
        ]);
        
    }
}
