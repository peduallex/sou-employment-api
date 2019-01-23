<?php

use Illuminate\Database\Seeder;

class DependentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = App\Models\Employee::all();
        $dependent_types = App\Models\DependentType::all();
        factory('App\Models\Dependent', 50)->create()->each(function ($dependent) use ($employees, $dependent_types){
            $dependent->employee_id = $employees->random()->employee_id;
            $dependent->dependent_type_id = $dependent_types->random()->dependent_type_id;
        });
    }
}
