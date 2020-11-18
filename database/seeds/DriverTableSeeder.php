<?php

use Str;
use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return App\Driver::create([
          'driver_id' => 'D7-cHcyd',
          'email' => 'iloristephen450@yahoo.com',
          'status' => 1,
          'password' => password_hash('password', PASSWORD_BCRYPT)
        ]);
    }
}
