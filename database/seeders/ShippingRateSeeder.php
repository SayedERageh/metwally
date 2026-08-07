<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShippingRate;

class ShippingRateSeeder extends Seeder
{
    public function run(): void
    {
        $rates = [

            [
                'governorate'=>'القاهرة',
                'price'=>50
            ],

            [
                'governorate'=>'الجيزة',
                'price'=>60
            ],

            [
                'governorate'=>'الإسكندرية',
                'price'=>80
            ],

            [
                'governorate'=>'القليوبية',
                'price'=>70
            ],

            [
                'governorate'=>'باقي المحافظات',
                'price'=>100
            ],

        ];


        foreach($rates as $rate){

            ShippingRate::create($rate);

        }
    }
}