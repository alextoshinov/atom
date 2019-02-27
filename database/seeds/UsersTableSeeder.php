<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe'
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
