<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email', 'mohamed938461@gmail.com')->first();

        if (!  $user) {
            User::create([
                'name' => 'Mohamed Salama',
                'email' => 'mohamed938461@gmail.com',
                'password'=>Hash::make('111111111'),
                'rol' =>'writer'
            ]);
        }
    }
}
