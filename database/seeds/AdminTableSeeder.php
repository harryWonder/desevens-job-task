<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      return App\Driver::create([
        'email' => 'iloristephen180@yahoo.com',
        'status' => 1,
        'password' => password_hash('password', PASSWORD_BCRYPT)
      ]);
    }
}
