<?php

use Illuminate\Database\Seeder;

class putRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([	
            'name' => "Admin",
            'status' => true
        ]);
        DB::table('role')->insert([	
            'name' => "Teacher",
            'status' => true
        ]);
        DB::table('role')->insert([	
            'name' => "Student",
            'status' => true
        ]);
    }
}
