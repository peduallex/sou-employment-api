<?php

use Illuminate\Database\Seeder;

class EthnicityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Ethnicity', 50)->create();
    }
}
