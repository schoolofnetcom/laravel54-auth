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
        factory(\App\User::class,1)->states('admin')->create([
            'email' => 'admin@user.com',
            'phone' => '00000000',
            'cpf' => '14476954880'
        ]);

        factory(\App\User::class,1)->states('user')->create([
            'email' => 'user@user.com'
        ]);

        factory(\App\User::class,3)->states('user');
    }
}
