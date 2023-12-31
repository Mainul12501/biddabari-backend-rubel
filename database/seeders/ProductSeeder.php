<?php

namespace Database\Seeders;

use App\Models\Backend\ProductManagement\Product;
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
        Product::factory()
            ->count(5)
            ->create();
    }
}
