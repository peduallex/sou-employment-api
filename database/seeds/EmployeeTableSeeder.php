<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Employee', 50)->create()->each(function ($employee){
            $employee->department()->save(factory(App\Models\Employee::class)->make());
            $employee->marital_status()->save(factory(App\Models\Employee::class)->make());
            $employee->city()->save(factory(App\Models\Employee::class)->make());
            $employee->country()->save(factory(App\Models\Employee::class)->make());
            $employee->address()->save(factory(App\Models\Employee::class)->make());
            $employee->ethnicity()->save(factory(App\Models\Employee::class)->make());
            $employee->occupation()->save(factory(App\Models\Employee::class)->make());
            $employee->nationality()->save(factory(App\Models\Employee::class)->make());
        });
    }
}
