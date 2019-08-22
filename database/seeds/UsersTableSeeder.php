<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'Darezzo',
                'email' => 'darezzo.gabriel@gmail.com',
                'password' => bcrypt('password'),
                'lat'  => -23.9789580,
                'lng'  => -46.3121512,
            ],
            [
                'name'=> 'Vitor',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'lat'  => -23.9772151,
                'lng'  => -46.3082780,
            ],
            [
                'name'=> 'Murillo',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'lat'  => -23.9581367,
                'lng'  => -46.3925527,
            ],
            [
                'name'=> 'DEXTERpy',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'lat'  => -23.9614568,
                'lng'  => -46.3247244,
            ],
            [
                'name'=> 'Celso',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'lat'  => -23.9739162,
                'lng'  => -46.3122721,
            ],
            [
                'name'=> 'Darezzo',
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('password'),
                'lat'  =>-23.9366827,
                'lng'  =>-46.3882702,
            ],
        ]);


    }
}
