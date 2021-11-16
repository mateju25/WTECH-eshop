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
            'name' => 'Lezečky La Sportiva',
            'shortDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
            'longDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitant morbi tristique senectus et. At consectetur lorem donec massa sapien faucibus et. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Neque viverra justo nec ultrices dui sapien eget mi proin.',
            'business_type_id' => 4,
            'category_id' => 1,
            'prize' => 59.99,
            'discountedPrize' => 49.99,
            'soldedCount' => 10,
            'rating' => 4.9,
            'top' => true,
            'bestOfWeek' => true,
            'image' => '/images/products/climbingShoes/lezecka1',
        ]);

        Product::create([
            'name' => 'Lezečky Simond',
            'shortDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
            'longDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitant morbi tristique senectus et. At consectetur lorem donec massa sapien faucibus et. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Neque viverra justo nec ultrices dui sapien eget mi proin.',
            'business_type_id' => 3,
            'category_id' => 1,
            'prize' => 99.99,
            'discountedPrize' => null,
            'soldedCount' => 5,
            'rating' => 4.5,
            'top' => true,
            'bestOfWeek' => false,
            'image' => '/images/products/climbingShoes/lezecka2',
        ]);

        Product::create([
            'name' => 'Lezečky La Sportiva Žlté',
            'shortDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
            'longDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitant morbi tristique senectus et. At consectetur lorem donec massa sapien faucibus et. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Neque viverra justo nec ultrices dui sapien eget mi proin.',
            'business_type_id' => 4,
            'category_id' => 1,
            'prize' => 79.99,
            'discountedPrize' => null,
            'soldedCount' => 1,
            'rating' => 4.7,
            'top' => true,
            'bestOfWeek' => false,
            'image' => '/images/products/climbingShoes/lezecka3',
        ]);

        Product::create([
            'name' => 'Lezečky La Sportiva Modre',
            'shortDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
            'longDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitant morbi tristique senectus et. At consectetur lorem donec massa sapien faucibus et. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Neque viverra justo nec ultrices dui sapien eget mi proin.',
            'business_type_id' => 4,
            'category_id' => 1,
            'prize' => 49.99,
            'discountedPrize' => null,
            'soldedCount' => 3,
            'rating' => 4.1,
            'top' => false,
            'bestOfWeek' => false,
            'image' => '/images/products/climbingShoes/lezecka4',
        ]);

        Product::create([
            'name' => 'Lezečky La Sportiva Mythos',
            'shortDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod',
            'longDescription' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Habitant morbi tristique senectus et. At consectetur lorem donec massa sapien faucibus et. Malesuada nunc vel risus commodo viverra maecenas accumsan lacus. Neque viverra justo nec ultrices dui sapien eget mi proin.',
            'business_type_id' => 4,
            'category_id' => 1,
            'prize' => 119.99,
            'discountedPrize' => null,
            'soldedCount' => 50,
            'rating' => 4.7,
            'top' => false,
            'bestOfWeek' => false,
            'image' => '/images/products/climbingShoes/lezecka5',
        ]);



    }
}
