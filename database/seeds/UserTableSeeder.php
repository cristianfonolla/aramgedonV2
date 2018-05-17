<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User;
        $user->name = "User";
        $user->email = "user@user.com";
        $user->password = '1234';
        $user->validate = 598634;
        //$user->api_token = '1234';
        $user->save();
    }
}
