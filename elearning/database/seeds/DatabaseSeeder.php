<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(putRoles::class);
        $this->call(putAdminUsers::class);
        $this->call(assingAdminRoleToAdmins::class);
        $this->call(ResourceType::class);
    }
}
