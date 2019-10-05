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
            ['name' => 'Aвтор неизвестен',
            'email' => 'authors_unknown@g.g',
            'password' => bcrypt(Str::random(16))
            ],
            [   'name' => 'Aвтор',
                'email' => 'author1@g.g',
                'password' =>bcrypt('123123')
            ],
            ];

        DB::table('users')->insert($data);
    }
}
