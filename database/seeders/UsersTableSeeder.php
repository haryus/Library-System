<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::updateOrCreate([
            "name"=> "Haarhius Pilongo",
            "username" => "admin",
            "email" => "harry@gmail.com",
            "password" => "password",
            "isActive" => "1",
        ]);
    }
}
