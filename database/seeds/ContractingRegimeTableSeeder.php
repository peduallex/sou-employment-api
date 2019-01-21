<?php

use Illuminate\Database\Seeder;

class ContractingRegimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\ContractingRegime', 50)->create();
    }
}
