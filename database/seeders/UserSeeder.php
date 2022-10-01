<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('username', 'rickicode')->delete();

        DB::table('users')->insert([
            'name' => 'ricki',
            'username' => 'rickicode',
            'email' => 'rickicode@gmail.com',
            'phone' => '6289514581444',
            'password' => bcrypt('12345677'),
            'current_team_id' => 1,
        ]);
    }
}
