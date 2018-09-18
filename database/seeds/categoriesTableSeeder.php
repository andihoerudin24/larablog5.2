<?php

use Illuminate\Database\Seeder;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('SET FOREIGN_KEY_CHECKS=0');
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
               [
                   'title'=>'judul artikel terbaru',
                   'slug'=>'judul-artikel-terbaru'
               ],
               [
                   'title'=>'judul artikel lama',
                   'slug'=>'judul-artikel-lama'
               ],
        ]);


    }
}
