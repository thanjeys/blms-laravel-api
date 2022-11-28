<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoordinatorRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coordinator_relations')->insert([
            ['co_user_id' => 2,  'rel_user_id' => 1, 'rel_type' => 'backend'],
            ['co_user_id' => 2,  'rel_user_id' => 3, 'rel_type' => 'telecaller'],
            ['co_user_id' => 1,  'rel_user_id' => 4, 'rel_type' => 'backend'],
            ['co_user_id' => 2,  'rel_user_id' => 5, 'rel_type' => 'telecaller'],
        ]);
    }
}
