<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevUserAdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['devadmin','devadmin@sch.id','+628213424231','IniUntukTestD3v'],
        ];

        foreach($users as $u) {
            User::create([
                'name'=> $u[0],
                'email'=> $u[1],
                'phone'=> $u[2],
                'password'=> Hash::make($u[3]),
                'user_role'=>'admin'
            ]);
        }
    }
}
