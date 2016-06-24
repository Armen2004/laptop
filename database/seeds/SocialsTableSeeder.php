<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SocialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('socials')->truncate();
        $socials = ['Facebook', 'Twitter', 'Google'];
        foreach ($socials as $social) {
            DB::table('socials')->insert([
                'name' => $social,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
