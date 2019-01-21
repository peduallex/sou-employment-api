<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'addresses'                 => 'AddressController',
    'cities'                    => 'CityController',
    'contracting-regimes'       => 'ContractingRegimeController',
    'countries'                 => 'CountryController',
    'departments'               => 'DepartmentController',
    'dependents'                => 'DependentController',
    'dependent-types'           => 'DependentTypeController',
    'education'                 => 'EducationController',
    'emails'                    => 'EmailController',
    'employees'                 => 'EmployeeController',
    'ethnicities'               => 'EthnicityController',
    'identities'                => 'IdentityController',
    'identity-types'            => 'IdentityTypeController',
    'issuing-entities'          => 'IssuingEntityController',
    'marital-statuses'          => 'MaritalStatusController',
    'nationalities'             => 'NationalityController',
    'occupations'               => 'OccupationController',
    'parentages'                => 'ParentageController',
    'parentage-types'           => 'ParentageTypeController',
    'tax-benefits'              => 'TaxBenefitController',
    'telephones'                => 'TelephoneController',
    'work-contracts'            => 'WorkContractController'
]);
