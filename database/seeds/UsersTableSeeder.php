<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'PandaGroup',
            'email' => 'admin@pangagroup.co',
            'password' => Hash::make('12Slaw64@'),
            'gender' => 'man',
            'is_active' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
