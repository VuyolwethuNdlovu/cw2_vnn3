<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_id' => 'admin@shangrila.gov.un',
            'role'=>'officer',
            'password' => hash('sha256','shangrila@2021$'),
            'api_token' => Str::random(60),
        ]);
    }
}
