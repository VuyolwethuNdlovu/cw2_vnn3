<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'question_text' => 'Do you have a petrol/diesel car?',
        ]);
        DB::table('questions')->insert([
            'question_text' => 'Shall SLEZ apply to PHEVs (Plug-in hybrid electric vehicles)',
        ]);
        DB::table('questions')->insert([
            'question_text' => 'What should be the proposed boundaries of SLEZ?',
        ]);



    }
}
