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
        factory('App\Models\WorkContract', 50)->create()->each(function ($work_contract){
            $work_contract->contracting_regime()->save(factory(App\Models\WorkContract::class)->make());
            $work_contract->address()->save(factory(App\Models\WorkContract::class)->make());
            $work_contract->employee()->save(factory(App\Models\WorkContract::class)->make());
        });
    }
}
