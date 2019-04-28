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
        $data = [
            [
                'name'     => 'Автор1',
                'email'    => 'autor1@ma.ru',
                'password' => bcrypt(321321),
            ],
            [
                'name'     => 'Автор2',
                'email'    => 'autor2@ma.ru',
                'password' => bcrypt(123321),
            ],
        ];

        DB::table('users')->insert($data);
    }
}
