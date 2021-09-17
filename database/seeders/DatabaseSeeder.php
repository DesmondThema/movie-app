<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Aglet',
            'email' => 'jointheteam@aglet.co.za',
            'password' => bcrypt('@TeamAglet'),
        ]);
    }
}
