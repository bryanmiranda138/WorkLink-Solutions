<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $userObj = new User();
        $userObj->name = 'postulante01';
        $userObj->email = 'post01@gmail.com';
        $userObj->password = Hash::make('123456789');
        $userObj->type = 0;
        $userObj->save();

        $adminObj = new User();
        $adminObj->name = 'empresa01';
        $adminObj->email = 'empre01@gmail.com';
        $adminObj->password = Hash::make('123456789');
        $adminObj->type = 1;
        $adminObj->save();

        $superAdminObj = new User();
        $superAdminObj->name = 'super01';
        $superAdminObj->email = 'super01@gmail.com';
        $superAdminObj->password = Hash::make('123456789');
        $superAdminObj->type = 2;
        $superAdminObj->save();

    }
}
