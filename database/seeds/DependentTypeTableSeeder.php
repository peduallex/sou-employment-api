<?php

use Illuminate\Database\Seeder;

class DependentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\DependentType', 50)->create();
    }
}
