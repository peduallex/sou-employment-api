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
      $departments = App\Models\Department::all();
      $marital_statuses = App\Models\MaritalStatus::all();
      $cities = App\Models\City::all();
      $countries = App\Models\Country::all();
      $ethnicities = App\Models\Ethnicity::all();
      $occupations = App\Models\Occupation::all();
      factory('App\Models\Employee', 50)->create()->each(function ($employee) use (
          $departments, $marital_statuses, $cities, $countries, $ethnicities, $occupations){
          $employee->department_id = $departments->random()->department_id;
          $employee->marital_status_id = $marital_statuses->random()->marital_status_id;
          $employee->city_id = $cities->random()->city_id;
          $employee->country_id = $countries->random()->country_id;
          $employee->ethnicity_id = $ethnicities->random()->ethnicity_id;
          $employee->occupation_id = $ethnicities->random()->occupation_id;
      });
    }
}
