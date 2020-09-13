<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{

    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            DB::table('products')->insert([
                'user_id' => 1,
                'product_number' => 'Product'.$i,
                'description' => Str::random(15),
                'product_link' => Str::random(10),
                'count' => 1,
                'price' => 2000
            ]);
        }
    }
}
