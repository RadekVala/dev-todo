<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'api_token' => Str::random(40),
        ]);
        factory(App\User::class, 5)->create();
    }
}
