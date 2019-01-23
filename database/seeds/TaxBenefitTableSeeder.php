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
        $work_contracts = App\Models\WorkContract::all();
        factory('App\Models\TaxBenefit', 50)->create()->each(function ($tax_benefit) use ($work_contracts){
            $tax_benefit->work_contract_id = $work_contracts->random()->work_contract_id;
        });
    }
}
