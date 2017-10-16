<?php
//namespace UiStacks\Roles\Seeds;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Visitor Role 1
        \DB::table('roles')->insert([
            'id' => 1,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 1,
            'name' => 'Administrator',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 1,
            'name' => 'مدير',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Visitor Role

        // Developer Role 2
        \DB::table('roles')->insert([
            'id' => 2,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 2,
            'name' => 'Supervisor',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 2,
            'name' => 'مشرف',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Developer Role

        // Adminstrator Role 3
        \DB::table('roles')->insert([
            'id' => 3,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 3,
            'name' => 'Manager',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 3,
            'name' => 'مدير',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Adminstrator User Role

        // supervisors User Role 4
        \DB::table('roles')->insert([
            'id' => 4,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 4,
            'name' => 'Developer',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 4,
            'name' => 'مطور',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End supervisors User Role

        // Registered User Role 4
        \DB::table('roles')->insert([
            'id' => 5,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 5,
            'name' => 'Member',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 5,
            'name' => 'مشترك',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Registered User Role
    }
}
