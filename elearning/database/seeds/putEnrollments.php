<?php

use Illuminate\Database\Seeder;

class putEnrollments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollment')->insert([	
            'id_enrollment' => 1,
            'period' => 2,
            'year' => 2017,
            'id_course' => 1,
            'id_user' => 4
        ]);
    }
}