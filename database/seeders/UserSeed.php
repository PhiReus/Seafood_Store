<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Nguyễn Phi';
        $user->email = 'Phireus2002@gmail.com';
        $user->address = 'Linh Chiểu';
        $user->phone = '0971320503';
        $user->image = 'image';
        $user->gender = 'Man';
        $user->birthday = '1999-02-20';
        $user->password = bcrypt('123456');
        $user->group_id = 1;
        $user->save();

    }
}
