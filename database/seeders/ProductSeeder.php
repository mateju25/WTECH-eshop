<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Lezecky20',
            'shortDescription' => 'sdfsdfsdfsdfširoké spektrum lezcov. Ľahká asymetria im poskytuje športvoý',
            'longDescription' => 'sdfsdffdsfsdfsdfsdfsdfké spektrum lezcov. Ľahká asymetria im poskytuje športvoý charakter, zatiaľ čo sa polstrovaný jazyk stará o vyšší komfort pri dlhšom nosení. Zapínanie na suchý zips umožňuje ľahké a rýchle obúvanie aj vyzúvanie, ktoré ocenia bouderisti a lezci na umelých stenách. Rovný profil, voľnejšia päta a polstrovaný jazyk poskytujú komfort, ktorý je potrebný aj na celodenné lezenie.',
            'businessType' => 'Ocun',
            'size' => '40',
            'prize' => 299.99,
            'discountedPrize' => 119.99,
            'soldedCount' => 10,
            'rating' => 4.9,
            'top' => true,
            'bestOfWeek' => false,
        ]);

        Product::create([
            'name' => 'Nieco',
            'shortDescription' => 'sdfsdfsdfsdfširoké spektrum lezcov. Ľahká asymetria im poskytuje športvoý',
            'longDescription' => 'sdfsdffdsfsdfsdfsdfsdfké spektrum lezcov. Ľahká asymetria im poskytuje športvoý charakter, zatiaľ čo sa polstrovaný jazyk stará o vyšší komfort pri dlhšom nosení. Zapínanie na suchý zips umožňuje ľahké a rýchle obúvanie aj vyzúvanie, ktoré ocenia bouderisti a lezci na umelých stenách. Rovný profil, voľnejšia päta a polstrovaný jazyk poskytujú komfort, ktorý je potrebný aj na celodenné lezenie.',
            'businessType' => 'Ocun',
            'size' => '40',
            'prize' => 299.99,
            'discountedPrize' => 119.99,
            'soldedCount' => 10,
            'rating' => 4.9,
            'top' => false,
            'bestOfWeek' => true,
        ]);

        Product::create([
            'name' => 'Kurz',
            'shortDescription' => 'sdfsdfsdfsdfširoké spektrum lezcov. Ľahká asymetria im poskytuje športvoý',
            'longDescription' => 'sdfsdffdsfsdfsdfsdfsdfké spektrum lezcov. Ľahká asymetria im poskytuje športvoý charakter, zatiaľ čo sa polstrovaný jazyk stará o vyšší komfort pri dlhšom nosení. Zapínanie na suchý zips umožňuje ľahké a rýchle obúvanie aj vyzúvanie, ktoré ocenia bouderisti a lezci na umelých stenách. Rovný profil, voľnejšia päta a polstrovaný jazyk poskytujú komfort, ktorý je potrebný aj na celodenné lezenie.',
            'businessType' => 'Ocun',
            'size' => '40',
            'prize' => 299.99,
            'discountedPrize' => 119.99,
            'soldedCount' => 10,
            'rating' => 4.9,
            'top' => false,
            'bestOfWeek' => true,
        ]);

        Product::create([
            'name' => 'Set',
            'shortDescription' => 'sdfsdfsdfsdfširoké spektrum lezcov. Ľahká asymetria im poskytuje športvoý',
            'longDescription' => 'sdfsdffdsfsdfsdfsdfsdfké spektrum lezcov. Ľahká asymetria im poskytuje športvoý charakter, zatiaľ čo sa polstrovaný jazyk stará o vyšší komfort pri dlhšom nosení. Zapínanie na suchý zips umožňuje ľahké a rýchle obúvanie aj vyzúvanie, ktoré ocenia bouderisti a lezci na umelých stenách. Rovný profil, voľnejšia päta a polstrovaný jazyk poskytujú komfort, ktorý je potrebný aj na celodenné lezenie.',
            'businessType' => 'Ocun',
            'size' => '40',
            'prize' => 299.99,
            'discountedPrize' => 119.99,
            'soldedCount' => 10,
            'rating' => 4.9,
            'top' => false,
            'bestOfWeek' => true,
        ]);

    }
}
