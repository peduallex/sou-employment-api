<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  
        $this->call(CityTableSeeder::class);
        $this->call(ContractingRegimeTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(NationalityTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(DependentTypeTableSeeder::class);
        $this->call(EthnicityTableSeeder::class);
        $this->call(IdentityTypeTableSeeder::class);
        $this->call(IssuingEntityTableSeeder::class);
        $this->call(MaritalStatusTableSeeder::class);
        $this->call(OccupationTableSeeder::class);
        $this->call(ParentageTypeTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(TelephoneTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(DependentTableSeeder::class);
        $this->call(EducationTableSeeder::class);
        $this->call(IdentityTableSeeder::class);
        $this->call(ParentageTableSeeder::class);
        $this->call(WorkContractTableSeeder::class);
        $this->call(TaxBenefitTableSeeder::class);
    }
}
