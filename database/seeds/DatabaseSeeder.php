<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(FoundationSeeder::class);
    }
}
