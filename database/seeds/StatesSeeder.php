<?php

use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Incomplete',
        ]);

        DB::table('states')->insert([
            'name' => 'Complete',
        ]);
    }
}
