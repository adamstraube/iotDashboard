<?php

use App\Database\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the User table with test account
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create(array('name' => 'Adam Straube', 'email' => 'straube.adam@gmail.com', 'password' => bcrypt('123456')));
    }
}
