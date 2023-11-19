<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Account extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roleId = DB::table('roles')->insertGetId([
            'name' => 'account',
            'display_name' => 'Account',
        ]);

        // Insert users
        $userId = DB::table('users')->insertGetId([
            'name' => 'Account User',
            'email' => 'accounts@nepalbarcouncil.com',
            'password' => Hash::make('Nepal@123'),
            'status' => true,
            'email_verified_at' => Carbon::now(),
            'phone_number' => '+977-01-5261884',
            'position' => 'Admin',
            'reference' => 'Nepal@123',
            'token' => '1234'
        ]);

        // Associate user with the account role
        DB::table('role_user')->insert([
            'role_id' => $roleId,
            'user_id' => $userId,
        ]);
    }
}
