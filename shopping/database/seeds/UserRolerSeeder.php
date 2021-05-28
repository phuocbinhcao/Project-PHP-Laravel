<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Quan tri he thong'],
            ['name' => 'guest', 'display_name' => 'Khach hang'],
            ['name' => 'developer', 'display_name' => 'Phat trien he thong'],
            ['name' => 'content', 'display_name' => 'Chinh su noi dung'],
        ]);
    }
}
