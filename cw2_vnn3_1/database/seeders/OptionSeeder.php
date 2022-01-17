<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'questions_id'=>'3',
            'option_text' => 'Inside the inner ring road.',
        ]);
        DB::table('options')->insert([
            'questions_id'=>'3',
            'option_text' => 'Outskrit of the town inside outer ring road.',
        ]);
        DB::table('options')->insert([
            'questions_id'=>'3',
            'option_text' => 'Town centre postcodes starting with SL only.',
        ]);
        DB::table('options')->insert([
            'questions_id'=>'1',
            'option_text' => 'Yes',
        ]);
        DB::table('options')->insert([
            'questions_id'=>'1',
            'option_text' => 'No',
        ]);
        DB::table('options')->insert([
            'questions_id'=>'2',
            'option_text' => 'Yes',
        ]);
        DB::table('options')->insert([
            'questions_id'=>'2',
            'option_text' => 'No',
        ]);
    }
}
