<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [ 'name' => 'admin', 'display_name' => 'Admin_Role' ],
            [ 'name' => 'guest', 'display_name' => 'Guest_Role' ],
            [ 'name' => 'developer', 'display_name' => 'Developer_Role' ],
            [ 'name' => 'content', 'display_name' => 'Content_Role' ],
        ]);
    }
}
