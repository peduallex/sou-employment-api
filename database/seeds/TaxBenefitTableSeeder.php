<?php

use Illuminate\Database\Seeder;

class TaxBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\TaxBenefit', 50)->create();
    }
}
