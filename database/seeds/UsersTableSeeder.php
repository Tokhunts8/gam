<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
            'id'         => 1,
            'name'       => 'Admin',
            'password'   => bcrypt('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
