<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'id'   => 1,
                'name' => 'Default'
            ],
            [
                'id'   => 2,
                'name' => 'առանց ֆոնի'
            ],
            [
                'id'   => 3,
                'name' => 'ցուցակ'
            ],
            [
                'id'   => 4,
                'name' => 'ֆոնով և բաժանած'
            ],
            [
                'id'   => 5,
                'name' => 'ղեկավարներ'
            ],
            [
                'id'   => 6,
                'name' => 'ֆայլի դիտում'
            ],
            [
                'id'   => 7,
                'name' => 'Կոնտակտային տվյալներ'
            ],
            [
                'id'   => 8,
                'name' => 'Հաշվետվություններ'
            ],
        ]);
    }
}
