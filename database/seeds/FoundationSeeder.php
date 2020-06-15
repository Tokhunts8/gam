<?php

use Illuminate\Database\Seeder;

class FoundationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foundations')->insert([
            'id'       => 1,
            'asset'    => 'ԱԿՏԻՎՆԵՐԻ ԲԱՇԽՈՒՄ',
            'ola'      => 'ASSET ALLOCATION',
            'areas'    => 'ԸՍՏ ՈԼՈՐՏՆԵՐԻ',
            'ols'      => 'BY AREAS',
            'currency' => 'ԸՍՏ ԱՐԺՈՒՅԹՆԵՐԻ',
            'oly'      => 'BY CURRENCIES',
            'maturity' => 'ՄԱՐՄԱՆ ԺԱՄԿԵՏ',
            'olm'      => 'MATURITY SUMMARY',
            'country'  => 'ԸՍՏ ԵՐԿՐՆԵՐԻ',
            'olc'      => 'BY COUNTRIES',
            'lastText' => 'ԸՍՏ ԱՐԺՈՒՅԹՆԵՐԻ',
            'ollt'     => 'BY CURRENCIES',
        ]);
    }
}
