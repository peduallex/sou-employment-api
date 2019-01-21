<?php

use Illuminate\Database\Seeder;

class ParentageTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\ParentageType', 50)->create();
    }
}
