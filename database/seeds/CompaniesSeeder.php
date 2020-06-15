<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'id'             => 1,
            'name'           => '«Ջեներալ Ասեթ Մենեջմենթ» ՓԲԸ',
            'oln'            => 'General Asset Managment CJSC',
            'menuAbout'      => 'ՄԵՐ ՄԱՍԻՆ',
            'olma'           => 'ABOUT US',
            'menuFoundation' => 'ՖՈՆԴԻ ՄԱՍԻՆ',
            'olmf'           => 'ABOUT FOUNDATION',
            'news'           => 'ՆՈՐՈՒԹՅՈՒՆՆԵՐ',
            'olnn'           => 'NEWS',
            'newsMore'       => 'Իմանալ ավելին',
            'olnm'           => 'Load more',
            'contact'        => 'ԿԱՊ',
            'olc'            => 'CONTACT',
            'links'          => 'ՕԳՏԱԿԱՐ ՀՂՈՒՄՆԵՐ',
            'oll'            => 'USEFUL LINKS',
            'settings'       => 'Կարգավորում',
            'ols'            => 'Settings',
            'law'            => 'ՕՐԵՆՔՆԵՐ:',
            'ollaw'          => 'LAWS:',
            'rules'          => 'ԿԱՆՈՆԱԿԱՐԳԵՐ:',
            'olr'            => 'RULES:',
            'settingTitle'   => '«Ջեներալ Ասեթ Մենեջմենթ» ՓԲԸ գործունեությունը կարգավորվում է հետևյալ իրավական ակտերով',
            'olst'           => 'The activities of General Asset Management CJSC are governed by the following legal acts',
            'work'           => 'Աշխատանքային գործունեություն',
            'olw'            => 'Work activity',
            'education'      => 'Կրթություն',
            'ole'            => 'Education',
        ]);
    }
}
