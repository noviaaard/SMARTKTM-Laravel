<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Admin',
        	'email' => 'admin@jgu.ac.id',
            'no_telfon' => '081308130813',
        	'password' => bcrypt('smartktm'),
        ]);
    }
}
