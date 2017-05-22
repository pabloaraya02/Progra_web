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
        //
    	DB::table('course')->insert([	
            'course_name' => "Mate 2",
            'duration' => 2,
            'start_date' => date('Y-m-d', strtotime('2017-07-03')),
            'end_date' => date('Y-m-d', strtotime('2017-07-16')),
            'status' => 1
        ]);
        DB::table('week')->insert([	
            'subject' => " ",
            'visible' => 1,
            'status' => 1,
            'start_date' => date('Y-m-d', strtotime('2017-07-03')),
            'end_date' => date('Y-m-d', strtotime('2017-07-09')),
            'id_course' => 1
        ]);
        DB::table('week')->insert([	
            'subject' => " ",
            'visible' => 1,
            'status' => 1,
            'start_date' => date('Y-m-d', strtotime('2017-07-10')),
            'end_date' => date('Y-m-d', strtotime('2017-07-16')),
            'id_course' => 1
        ]);


        DB::table('enrollment')->insert([	
            'id_enrollment' => 1,
            'period' => 2,
            'year' => 2017,
            'id_course' => 1,
            'id_user' => 4,
            'enrollment_date' => '2017-01-01'
        ]);
    }
}
