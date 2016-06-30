<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LessonsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_types')->truncate();
        $types = ['Free', 'Paid'];
        foreach ($types as $type) {
            DB::table('lesson_types')->insert([
                'name' => $type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
