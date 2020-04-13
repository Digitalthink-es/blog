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
        //factory(App\User::class, 29)
        //	->create(); // Crea 29 usuarios

        App\User::create([
        	'name' => 'Daniel Martínez',
        	'email' => 'dmpinero@gmail.com',
        	'password' => bcrypt('123')
        ]);
    }
}
