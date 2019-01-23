<?php

use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = App\Models\Employee::all();
        factory('App\Models\Education', 50)->create()->each(function ($education) use ($employees){
            $education->employee_id = $employees->random()->employee_id;
        });
    }
}
