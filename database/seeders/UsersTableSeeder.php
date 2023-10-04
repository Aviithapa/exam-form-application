<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@nepalbarcouncil.com',
                'password' => Hash::make('Nepal@123'),
                'status' => true,
                'email_verified_at' => Carbon::now(),
                'phone_number' => '+977-01-5261884',
                'position' => 'Admin',
                'reference' => 'Nepal@123'
            ],
        ]);

        DB::table('role_user')->insert([
            ['role_id' => 1, 'user_id' => 1]
        ]);
    }
}
