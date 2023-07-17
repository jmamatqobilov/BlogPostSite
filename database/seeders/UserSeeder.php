<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        User::create([
            'name'=>'manager',
            'role_id'=>1,
            'email'=>'manager@company.com',
            'password'=>Hash::make('secretparol')
        ]);
        User::create([
            'name'=>'Clinet Javakhir',
            'role_id'=>2,
            'email'=>'clientr@company.com',
            'password'=>Hash::make('secretparol')
        ]);
    }
}
