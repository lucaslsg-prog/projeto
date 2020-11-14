<?php

use App\User;
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
        $usuarios = [
            [
                'name' => 'Administrador',
                'email' => 'admin@email.com',
                'password' => '12345678',
                'admin' => true
            ],
            [
                'name' => 'Usuario',
                'email' => 'user@email.com',
                'password' => '12345678',
                'admin' => false
            ]
        ];

        foreach($usuarios as $u) {
            User::firstOrCreate(
                [
                    'email' => $u['email']
                ],
                [
                    'name' => $u['name'],
                    'email' => $u['email'],
                    'password' => $u['password'],
                    'admin' => $u['admin']
                ]
            );
        }
    }
}
