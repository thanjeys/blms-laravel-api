<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_user')->insert([
            ['user_id' => 1,  'product_id' => 2],
            ['user_id' => 1,  'product_id' => 3],
            ['user_id' => 1,  'product_id' => 4],
            ['user_id' => 3,  'product_id' => 3],
            ['user_id' => 2, 'proudct_id' => 1],
            ['user_id' => 2, 'proudct_id' => 2],
            ['user_id' => 2, 'proudct_id' => 3]
        ]);
    }
}
