<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class couponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => '30',


        ]);
        Coupon::create([
            'code' => 'DE456',
            'type' => 'percent',
            'value' => '40',


        ]);
    }
}
