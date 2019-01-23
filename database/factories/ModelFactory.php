<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Address::class, function (Faker $faker) {
    return [
       'neighborhood'      => $faker->cityPrefix,
       'street'            => $faker->streetName,
       'street_number'     => $faker->buildingNumber,
       'street_type'       => $faker->streetSuffix,
       'zipcode'           => $faker->randomNumber($nbDigits = 7),
       'street_complement' => $faker->secondaryAddress,
       'state'             => $faker->stateAbbr,
       'city_id'           => rand(1, 50),
    ];
});

$factory->define(App\Models\City::class, function (Faker $faker) {
    return [
       'name'  => $faker->city,
       'state' => $faker->stateAbbr,
       'code'  => $faker->randomNumber($nbDigits = 7),
    ];
});

$factory->define(App\Models\ContractingRegime::class, function (Faker $faker) {
    return [
       'name' => $faker->catchPhrase,
    ];
});

$factory->define(App\Models\Country::class, function (Faker $faker) {
    return [
        'code' => $faker->randomNumber($nbDigits = 3),
        'name' => $faker->country,
        'portuguese_name' => '$portuguese name',
        'iso_alfa' => $faker->currencyCode,
    ];
});

$factory->define(App\Models\Department::class, function (Faker $faker) {
    return [
        'code' => $faker->numberBetween($min = 0000000001, $max = 9999999999),
        'name' => $faker->catchPhrase,
    ];
});

$factory->define(App\Models\Dependent::class, function (Faker $faker) {
    return [
       'name'              => $faker->name,
       'birth_date'        => $faker->date,
       'cpf'               => $faker->numberBetween($min = 00000000001, $max = 99999999999),
       'employee_id'       => rand(1, 50),
       'dependent_type_id' => rand(1, 50),
    ];
});

$factory->define(App\Models\DependentType::class, function (Faker $faker) {
    return [
       'name' => $faker->lexify('???????'),
    ];
});

$factory->define(App\Models\Education::class, function (Faker $faker) {
    return [
       'course'                 => $faker->catchPhrase,
       'education_level'        => $faker->suffix,
       'education_institution'  => $faker->company,
       'starting_date'          => $faker->date,
       'finishing_date'         => $faker->date,
       'employee_id'            => rand(1, 50),
    ];
});

$factory->define(App\Models\Email::class, function (Faker $faker) {
    return [
       'email'             => $faker->email,
       'email_type'        => $faker->lexify('???????'),
    ];
});

$factory->define(App\Models\Employee::class, function (Faker $faker) {
    return [
       'name'                  => $faker->firstName($gender = 'male', 'female'),
       'last_name'             => $faker->lastName,
       'birth_date'            => $faker->date,
       'gender'                => $faker->randomLetter,
       'cpf'                   => $faker->numberBetween($min = 00000000001, $max = 99999999999),
       'blood_type'            => $faker->lexify('???'),
       'organ_donor'           => $faker->boolean($chanceOfGettingTrue = 50),
       'assumed_name'          => $faker->name,
       'flag_pwd'              => $faker->boolean($chanceOfGettingTrue = 50),
       'flag_visually'         => $faker->boolean($chanceOfGettingTrue = 50),
       'flag_hearing'          => $faker->boolean($chanceOfGettingTrue = 50),
       'flag_physically'       => $faker->boolean($chanceOfGettingTrue = 50),
       'flag_intellectually'   => $faker->boolean($chanceOfGettingTrue = 50),
       'description_other_pwd' => $faker->text($maxNbChars = 200),
       'first_job_ctps'        => $faker->lexify('????'),
       'first_job_public'      => $faker->lexify('????'),
       'icd'                   => $faker->numberBetween($min = 0000000001, $max = 9999999999),
       'department_id'         => rand(1, 50),
       'marital_status_id'     => rand(1, 50),
       'city_id'               => rand(1, 50),
       'country_id'            => rand(1, 50),
       'address_id'            => rand(1, 50),
       'ethnicity_id'          => rand(1, 50),
       'occupation_id'         => rand(1, 50),
       'nationality_id'        => rand(1, 50),
    ];
});

$factory->define(App\Models\Ethnicity::class, function (Faker $faker) {
    return [
       'name' => $faker->word,
       'description' => $faker->text($maxNbChars = 30),
    ];
});

$factory->define(App\Models\Identity::class, function (Faker $faker) {
    return [
       'date_issued'       => $faker->date,
       'description'       => $faker->text($maxNbChars = 30),
       'number'            => $faker->numberBetween($min = 0000000001, $max = 9999999999),
       'series_number'     => $faker->numberBetween($min = 0000000001, $max = 9999999999),
       'state_issued'      => $faker->stateAbbr,
       'zone'              => $faker->lexify('??????'),
       'section'           => $faker->lexify('??????'),
       'identity_type_id'  => rand(1, 50),
       'issuing_entity_id' => rand(1, 50),
    ];
});

$factory->define(App\Models\IdentityType::class, function (Faker $faker) {
    return [
       'name' => $faker->word,
    ];
});

$factory->define(App\Models\IssuingEntity::class, function (Faker $faker) {
    return [
       'name' => $faker->word,
    ];
});

$factory->define(App\Models\MaritalStatus::class, function (Faker $faker) {
    return [
       'name' => $faker->word,
    ];
});

$factory->define(App\Models\Nationality::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Models\Occupation::class, function (Faker $faker) {
    return [
       'code'                       => $faker->numberBetween($min = 0000000001, $max = 9999999999),
       'name'                       => $faker->word,
       'political_office'           => $faker->randomLetter,
       'educational_level_required' => $faker->suffix,
       'responsible_entity'         => $faker->randomLetter,
       'cbo_code'                   => $faker->numberBetween($min = 0000000001, $max = 9999999999),
    ];
});

$factory->define(App\Models\Parentage::class, function (Faker $faker) {
    return [
       'name'              => $faker->word,
       'gender'            => $faker->randomLetter,
       'birth_date'        => $faker->date,
       'parentage_type_id' => rand(1, 50),
    ];
});

$factory->define(App\Models\ParentageType::class, function (Faker $faker) {
    return [
       'name' => $faker->word,
    ];
});

$factory->define(App\Models\TaxBenefit::class, function (Faker $faker) {
    return [
       'code'             => $faker->numberBetween($min = 0000000001, $max = 9999999999),
       'name'             => $faker->bs,
       'value'            => $faker->randomFloat($nbMaxDecimals = 5, $min = 1, $max = 99999),
       'work_contract_id' => rand(1, 50),
    ];
});

$factory->define(App\Models\Telephone::class, function (Faker $faker) {
    return [
       'ddd'               => $faker->randomNumber($nbDigits = 3),
       'telephone'         => $faker->tollFreePhoneNumber,
       'telephone_type'    => $faker->word,
       'ddi'               => $faker->randomNumber($nbDigits = 3),
    ];
});

$factory->define(App\Models\WorkContract::class, function (Faker $faker) {
    return [
        'hiring_date'           => $faker->date,
        'end_date'              => $faker->date,
        'examination_date'      => $faker->date,
        'dismissal_date'        => $faker->date,
        'flag_fixed_term'       => $faker->randomLetter,
        'term'                  => $faker->numberBetween($min = 000000001, $max = 999999999),
        'new_end_date'          => $faker->date,
        'new_term'              => $faker->numberBetween($min = 000000001, $max = 999999999),
        'contracting_regime_id' => rand(1, 50),
        'address_id'            => rand(1, 50),
        'employee_id'           => rand(1, 50),
    ];
});
