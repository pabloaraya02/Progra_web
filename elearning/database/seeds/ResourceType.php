<?php

use Illuminate\Database\Seeder;

class ResourceType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('resource_type')->insert([	
            'resource_type_name' => "Video",
        ]);
        DB::table('resource_type')->insert([	
            'resource_type_name' => "Documento",
        ]);
        DB::table('resource_type')->insert([	
            'resource_type_name' => "Imagen"
        ]);
        DB::table('resource_type')->insert([	
            'resource_type_name' => "Audio"
        ]);
    }
}
