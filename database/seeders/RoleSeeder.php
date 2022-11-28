<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Tele Caller', 'slug'=> 'telecaller', 'active' => 1]);
        Role::create(['name' => 'Co-Ordinator' , 'slug'=> 'co-ordinator', 'active' => 1]);
        Role::create(['name' => 'Backend' , 'slug'=> 'backend', 'active' => 1]);
        Role::create(['name' => 'Administrator' , 'slug'=> 'admin', 'active' => 1]);
    }
}
