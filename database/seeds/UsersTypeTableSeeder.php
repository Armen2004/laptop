<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->truncate();
        $types = [
            ['name' => 'Free membership', 'price' => 0], 
            ['name' => 'Premium membership', 'price' => 100], 
            ['name' => '60 day fast start membership', 'price' => 50]
        ];
        foreach ($types as $type) {
            DB::table('user_types')->insert([
                'name' => $type['name'],
                'price' => $type['price'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
