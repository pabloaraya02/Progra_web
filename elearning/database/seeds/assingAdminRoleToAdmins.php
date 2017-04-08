<?php

use Illuminate\Database\Seeder;

class assingAdminRoleToAdmins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('user_role')->insert([	
            "id_user" => 1,	//sergio
            "id_role" => 1, //admin
            "status" => true
        ]);
        DB::table('user_role')->insert([	
            "id_user" => 2, //sergio
            "id_role" => 1, //admin
            "status" => true
        ]);
    }
}
