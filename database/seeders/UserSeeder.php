<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['Marcellino','marcellino.com','123456789','123456789'],
            ['Malvin','malvin.com','123456789','123456789'],
            ['Glenn','glenn.com','123456789','123456789'],
            ['Kristo','Kristo.com','123456789','123456789'],
            ['Iyok','Iyok.com','123456789','123456789']
        ];

        foreach($users as $u) {
            User::create([
                'name'=> $u[0],
                'email'=> $u[1],
                'phone'=> $u[2],
                'password'=> Hash::make($u[3]),
                'user_role'=>'USER'
            ]);
        }
    }
}
