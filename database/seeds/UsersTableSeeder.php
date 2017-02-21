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
//        DB::table('users')->insert([            
//            'name' => str_random(10),
//            'username' => 'admin',
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('admin'),
//        ]);
        factory(App\User::class)->create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);
      
    }
}
