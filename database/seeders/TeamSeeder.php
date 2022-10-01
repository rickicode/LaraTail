<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->where('name', 'HIJINETWORK')->delete();

        DB::table('teams')->insert([
            'user_id' => 1,
            'name' => 'HIJINETWORK',
            'personal_team' => 1,
        ]);
    }
}
