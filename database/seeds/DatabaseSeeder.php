<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//    	$this->call(uistacks\Users\Seeds\RolesTableSeeder::class);
//        $this->call(uistacks\Users\Seeds\UsersTableSeeder::class);
//        $this->call(uistacks\Countries\Seeds\CountriesTableSeeder::class);
//        $this->call(uistacks\Settings\Seeds\SettingsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
//        $this->call(CountriesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
