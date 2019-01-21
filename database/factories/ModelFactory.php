<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Address::class, function (Faker $faker) {
    return [
       'neighborhood'      => str_random(30),
       'street'            => str_random(30),
       'street_number'     => str_random(3),
       'street_type'       => str_random(18),
       'zipcode'           => str_random(8) ,
       'street_complement' => str_random(30),
       'state'             => str_random(2),
       'city_id'           => App\Models\City::all()->random()->id,
    ];
});

$factory->define(App\Models\City::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'state' => 'AA',
       'code' => '1234567',
    ];
});

$factory->define(App\Models\ContractingRegime::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
    ];
});

$factory->define(App\Models\Country::class, function (Faker $faker) {
    return [
        'code' => '123',
        'name' => $faker->country,
        'portuguese_name' => $faker->name,
        'iso_alfa' => 'ISO',
    ];
});

$factory->define(App\Models\Department::class, function (Faker $faker) {
    return [
        'code' => '1234567890',
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Dependent::class, function (Faker $faker) {
    return [
       'name'              => str_random(30),
       'birth_date'        => $faker->date,
       'cpf'               => str_random(14),
       'employee_id'       => 1,
       'dependent_type_id' => App\Models\DependentType::all()->random()->id,
    ];
});

$factory->define(App\Models\DependentType::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
    ];
});

$factory->define(App\Models\Education::class, function (Faker $faker) {
    return [
       'course'                 => str_random(20),
       'education_level'        => str_random(20),
       'education_institution'  => str_random(30),
       'starting_date'          => $faker->date,
       'finishing_date'         => $faker->date,
       'employee_id'            => App\Models\Employee::all()->random()->id,
    ];
});

$factory->define(App\Models\Email::class, function (Faker $faker) {
    return [
       'email'             => $faker->email,
       'email_type'        => str_random(30),
    ];
});

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
       'name'                  => $faker->name,
       'last_name'             => $faker->name,
       'birth_date'            => $faker->date,
       'gender'                => 'G',
       'cpf'                   => '123.456.789-14',
       'blood_type'            => 'O+',
       'organ_donor'           => true,
       'assumed_name'          =>$faker->name,
       'flag_pwd'              => true,
       'flag_visually'         => true,
       'flag_hearing'          => true,
       'flag_physically'       => true,
       'flag_intellectually'   => true,
       'description_other_pwd' => true,
       'first_job_ctps'        => 'fjc',
       'first_job_public'      => 'fjp',
       'icd'                   => '1234567890',
       'department_id'         => App\Models\Department::all()->random()->id,
       'marital_status_id'     => App\Models\MaritalStatus::all()->random()->id,
       'city_id'               => App\Models\City::all()->random()->id,
       'country_id'            => App\Models\Country::all()->random()->id,
       'address_id'            => App\Models\Address::all()->random()->id,
       'ethnicity_id'          => App\Models\Ethnicity::all()->random()->id,
       'occupation_id'         => App\Models\Occupation::all()->random()->id,
       'nationality_id'        => App\Models\Nationality::all()->random()->id,
    ];
});

$factory->define(App\Models\Ethnicity::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'description' => 'description',
    ];
});

$factory->define(App\Models\Identity::class, function (Faker $faker) {
    return [
       'date_issued'       => $faker->date,
       'description'       => str_random(30),
       'number'            => str_random(30),
       'series_number'     => str_random(10),
       'state_issued'      => str_random(2),
       'zone'              => str_random(6),
       'section'           => str_random(6),
       'identity_type_id'  => App\Models\IdentityType::all()->random()->id,
       'issuing_entity_id' => App\Models\IssuingEntity::all()->random()->id,
    ];
});

$factory->define(App\Models\IdentityType::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
    ];
});

$factory->define(App\Models\IssuingEntity::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
    ];
});

$factory->define(App\Models\MaritalStatus::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
    ];
});

$factory->define(App\Models\Nationality::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Occupation::class, function (Faker $faker) {
    return [
       'code'                       => '12345678901234567890',
       'name'                       => $faker->name,
       'political_office'           => 'P',
       'educational_level_required' => 'educational',
       'responsible_entity'         => 'R',
       'cbo_code'                   => '12345678901234567890',
    ];
});

$factory->define(App\Models\Parentage::class, function (Faker $faker) {
    return [
       'name'              => str_random(30),
       'gender'            => str_random(1),
       'birth_date'        => $faker->date,
       'parentage_type_id' => App\Models\ParentageType::all()->random()->id,
    ];
});

$factory->define(App\Models\ParentageType::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
    ];
});

$factory->define(App\Models\TaxBenefit::class, function (Faker $faker) {
    return [
       'code'             => '1234567890',
       'name'             => $faker->name,
       'value'            => 15.2,
       'work_contract_id' => App\Models\WorkContract::all()->random()->id,
    ];
});

$factory->define(App\Models\Telephone::class, function (Faker $faker) {
    return [
       'ddd'               => str_random(4),
       'telephone'         => '(011)1234-5678',
       'telephone_type'    => str_random(20),
       'ddi'               => str_random(6),
    ];
});

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\WorkContract::class, function (Faker $faker) {
    return [
        'hiring_date'           => $faker->date,
        'end_date'              => $faker->date,
        'examination_date'      => $faker->date,
        'dismissal_date'        => $faker->date,
        'flag_fixed_term'       => str_random(1) ,
        'term'                  => 123456789,
        'new_end_date'          => $faker->date,
        'new_term'              => 123456789,
        'contracting_regime_id' => App\Models\ContractingRegime::all()->random()->id,
        'address_id'            => App\Models\Address::all()->random()->id,
        'employee_id'           => App\Models\Employee::all()->random()->id,
    ];
});
