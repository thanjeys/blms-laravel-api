<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['name' => 'Personal Loan', 'active' => 1]);
        Product::create(['name' => 'Housing Loan', 'active' => 1]);
        Product::create(['name' => 'LAP', 'active' => 1]);
        Product::create(['name' => 'PL Top Up', 'active' => 1]);

        
    }
}
