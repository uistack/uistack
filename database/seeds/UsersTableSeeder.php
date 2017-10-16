<?php

use Illuminate\Database\Seeder;
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
        // ِAdmins
        \DB::table('users')->insert([
            'name' => 'UiStacks',
            'email' => 'admin@uistacks.com',
            'phone' => '9762137636',
            'country_id' => 1,
            'area_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('admin@2017'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 1,
            'user_id'=> 1
        ]);


        \DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'ramesh@uistacks.com',
            'phone' => '9403743126',
            'country_id' => 1,
            'area_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('Pass@2017'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 1,
            'user_id'=> 2
        ]);

        // Mock Memebers
        \DB::table('users')->insert([
            'name' => 'Supervisor',
            'email' => 'supervisor@uistacks.com',
            'email_show' => 1,
            'phone' => '10238484845',
            'phone_show' => 1,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('Pass@123'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 2,
            'user_id'=> 3
        ]);

        \DB::table('users')->insert([
            'name' => 'manager',
            'email' => 'manager@uistacks.com',
            'email_show' => 0,
            'phone' => '251234568',
            'phone_show' => 0,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('Pass@123'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 3,
            'user_id'=> 4
        ]);

        \DB::table('users')->insert([
            'name' => 'developer',
            'email' => 'developer@uistacks.com',
            'email_show' => 0,
            'phone' => '36251234568',
            'phone_show' => 0,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('Pass@123'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 4,
            'user_id'=> 5
        ]);

        \DB::table('users')->insert([
            'name' => 'member',
            'email' => 'member@uistacks.com',
            'email_show' => 1,
            'phone' => '65441234568',
            'phone_show' => 1,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('Pass@123'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 5,
            'user_id'=> 6
        ]);

    }
}
