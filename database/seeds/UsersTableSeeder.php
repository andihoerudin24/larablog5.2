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
        DB::table('SET FOREIGN_KEY_CHECKS=0');
        //DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name'=>'john doe',
                'email'=>'john@mail.com',
                'password'=>bcrypt('secret')
            ],
            [
                'name'=>'janedoe',
                'email'=>'jane@mail.com',
                'password'=>bcrypt('secret')
            ],
            [
                'name'=>'andihoerudin',
                'email'=>'andi@mail.com',
                'password'=>bcrypt('secret')
            ]
        ]);

    }
}
