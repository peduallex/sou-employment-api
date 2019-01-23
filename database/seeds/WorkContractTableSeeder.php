<?php

use Illuminate\Database\Seeder;

class WorkContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contracting_regimes = App\Models\ContractingRegime::all();
        $addresses = App\Models\Address::all();
        $employees = App\Models\Employee::all();
        factory('App\Models\WorkContract', 50)->create()->each(function ($work_contract) use (
            $contracting_regimes, $addresses, $employees){
            $work_contract->contracting_regime_id = $contracting_regimes->random()->contracting_regime_id;
            $work_contract->address_id = $addresses->random()->address_id;
            $work_contract->employee_id = $employees->random()->employee_id;
        });
    }
}
