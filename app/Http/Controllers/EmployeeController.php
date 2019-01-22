<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\Dependent;
use App\Models\Education;
use App\Models\Email;
use App\Models\Employee;
use App\Models\Identity;
use App\Models\Nationality;
use App\Models\Parentage;
use App\Models\Telephone;
use App\Models\TaxBenefit;
use App\Models\WorkContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\CityRequest;
use App\Http\Resources\EmployeeResource;
use App\Repositories\Repository;

class EmployeeController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Employee $employee){

        $this->model = new Repository($employee);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/employees",
     *      summary="Exibe listagem de colaboradores.",
     *      tags={"Employee"},
     *      description="Obter todos os colaboradores.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function index()
    {
        return EmployeeResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param EmployeeRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/employees",
     *      summary="Armazena colaborador recém-criado no banco de dados",
     *      tags={"Employee"},
     *      description="Armazena um colaborador",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Employee", in="body", required=true,
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="last_name",  type="string", example="last name"),
     *              @SWG\Property(property="birth_date",  type="string", example="2000-01-01"),
     *              @SWG\Property(property="gender",  type="string", example="M"),
     *              @SWG\Property(property="flag_on",  type="boolean", example="true"),
     *              @SWG\Property(property="cpf",  type="string", example="123.456.789-00"),
     *              @SWG\Property(property="blood_type",  type="string", example="O+"),
     *              @SWG\Property(property="organ_donor",  type="boolean", default="true"),
     *              @SWG\Property(property="assumed_name",  type="string", example="assumed name"),
     *              @SWG\Property(property="flag_pwd",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_visually",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_hearing",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_physically",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_intellectually",  type="boolean", default="true"),
     *              @SWG\Property(property="description_other_pwd",  type="string", example="description other pwd"),
     *              @SWG\Property(property="first_job_ctps",  type="string", example="fjc"),
     *              @SWG\Property(property="first_job_public",  type="string", example="fjp"),
     *              @SWG\Property(property="icd",  type="string", example="1234567893"),
     *              @SWG\Property(property="country_id",  type="integer", example="1"),
     *              @SWG\Property(property="nationality_id",  type="integer", example="1"),
     *              @SWG\Property(property="ethnicity_id",  type="integer", example="1"),
     *              @SWG\Property(property="marital_status_id",  type="integer", example="1"),
     *              @SWG\Property(property="address",
     *                  @SWG\Property(property="neighborhood", type="string", example="neighborhood"),
     *                  @SWG\Property(property="street", type="string", example="street"),
     *                  @SWG\Property(property="street_number", type="string", example="123"),
     *                  @SWG\Property(property="street_type", type="string", example="street type"),
     *                  @SWG\Property(property="zipcode", type="string", example="01234-567"),
     *                  @SWG\Property(property="street_complement", type="string", example="street_complement"),
     *                  @SWG\Property(property="state", type="string", example="AA"),
     *                  @SWG\Property(property="city_id", type="integer", example="1"),
     *              ),
     *              @SWG\Property(property="city",
     *                  @SWG\Property(property="name", type="string", example="name"),
     *                  @SWG\Property(property="state", type="string", example="AA"),
     *                  @SWG\Property(property="code", type="string", example="1234567"),
     *              ),
     *              @SWG\Property(property="telephone",
     *                  @SWG\Property(property="ddd", type="string", example="123"),
     *                  @SWG\Property(property="telephone", type="string", example="(11)1234-5678"),
     *                  @SWG\Property(property="telephone_type", type="string", example="telephone type"),
     *                  @SWG\Property(property="ddi", type="string", example="123"),
     *              ),
     *              @SWG\Property(property="email",
     *                  @SWG\Property(property="email", type="string", example="email@email.com"),
     *                  @SWG\Property(property="email_type", type="string", example="email type"),
     *              ),
     *              @SWG\Property(property="department_id",  type="integer", example="1"),
     *              @SWG\Property(property="dependents", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="name", type="string", example="name"),
     *                      @SWG\Property(property="birth_date", type="string", example="2000-01-01"),
     *                      @SWG\Property(property="cpf", type="string", example="123.456.789-00"),
     *                      @SWG\Property(property="employee_id", type="string", example="1"),
     *                      @SWG\Property(property="dependent_type_id", type="integer", example="1"),
     *                  ),
     *              ),
     *              @SWG\Property(property="education",
     *                  @SWG\Property(property="course", type="string", example="course"),
     *                  @SWG\Property(property="education_level", type="string", example="education level"),
     *                  @SWG\Property(property="education_institution", type="string", example="education institution"),
     *                  @SWG\Property(property="starting_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="finishing_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="employee_id", type="integer", example="1"),
     *              ),
     *              @SWG\Property(property="parentages", type="array",
     *                  @SWG\Items(
     *                      type="object",
     *                      @SWG\Property(property="name", type="string", example="name"),
     *                      @SWG\Property(property="gender", type="string", example="M"),
     *                      @SWG\Property(property="birth_date", type="string", example="2000-01-01"),
     *                      @SWG\Property(property="parentage_type_id", type="integer", example="1"),
     *                  ),
     *              ),
     *              @SWG\Property(property="occupation_id",  type="integer", example="1"),
     *              @SWG\Property(property="identities", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="date_issued", type="string", example="2000-01-01"),
     *                      @SWG\Property(property="description", type="string", example="description"),
     *                      @SWG\Property(property="number", type="string", example="123456789"),
     *                      @SWG\Property(property="series_number", type="string", example="123456789"),
     *                      @SWG\Property(property="state_issued", type="string", example="AA"),
     *                      @SWG\Property(property="zone", type="string", example="zone"),
     *                      @SWG\Property(property="section", type="string", example="abc"),
     *                      @SWG\Property(property="identity_type_id", type="integer", example="1"),
     *                      @SWG\Property(property="issuing_entity_id", type="integer", example="1"),
     *                  ),
     *              ),
     *              @SWG\Property(property="work_contract",
     *                  @SWG\Property(property="hiring_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="end_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="examination_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="dismissal_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="flag_fixed_term", type="string", example="A"),
     *                  @SWG\Property(property="term", type="string", example="1234567890"),
     *                  @SWG\Property(property="new_end_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="new_term", type="string", example="1234567890"),
     *                  @SWG\Property(property="contracting_regime_id", type="integer", example="1"),
     *              ),
     *              @SWG\Property(property="tax_benefits", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="name", type="string", example="name"),
     *                      @SWG\Property(property="code", type="string", example="1234567890"),
     *                      @SWG\Property(property="value", type="number", example="1500"),
     *                      @SWG\Property(property="work_contract_id", type="integer", example="1"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(EmployeeRequest $request)
    {
        try{
            $address = $request->input('address');
            $city = $request->input('city');
            $dependents = $request->input('dependents');
            $education = $request->input('education');
            $email = $request->input('email');
            $employee = $request->all();
            $identities = $request->input('identities');
            $parentages = $request->input('parentages');
            $taxBenefits = $request->input('tax_benefits');
            $telephone = $request->input('telephone');
            $workContract = $request->input('work_contract');

            $city = City::create($city);

            $address['city_id'] = $city->id;
            $address = Address::create($address);

            $employee['city_id'] = $city->id;
            $employee['address_id'] = $address->id;
            $employee = Employee::create($employee);

            $telephone = Telephone::create($telephone);
            $employee->telephones()->attach($telephone);

            $email = Email::create($email);
            $employee->emails()->attach($email);

            foreach ($dependents as $dependent) {
              $dependent['employee_id'] = $employee->id;
              $dependent = Dependent::create($dependent);
            }

            $education['employee_id'] = $employee->id;
            $education = Education::create($education);

            foreach ($parentages as $parentage) {
                $employee->parentages()->attach(Parentage::create($parentage));
            }

            foreach ($identities as $identity) {
                $employee->identities()->attach(Identity::create($identity));
            }

            $workContract['address_id'] = $address->id;
            $workContract['employee_id'] = $employee->id;
            $workContract = WorkContract::create($workContract);

            foreach ($taxBenefits as $taxBenefit) {
                $taxBenefit['work_contract_id'] = $workContract->id;
                $taxBenefit = TaxBenefit::create($taxBenefit);
            }

            return new EmployeeResource($employee);

        } catch (\Exception $e){
            return response()->json(['message'=>'Ocorreu um erro no servidor'], 500);
        }
    }

    /**
     * @param Employee $employee
     * @return Response
     *
     * @SWG\Get(
     *      path="/employees/{id}",
     *      summary="Exibe colaborador específico.",
     *      tags={"Employee"},
     *      description="Obter colaborador pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="employee", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    /**
     * @param Employee $employee
     * @param EmployeeRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/employees/{id}",
     *      summary="Atualiza colaborador específico do banco de dados.",
     *      tags={"Employee"},
     *      description="Atualiza colaborador pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="employee", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Employee", in="body", required=true,
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="last_name",  type="string", example="last name"),
     *              @SWG\Property(property="birth_date",  type="string", example="2000-01-01"),
     *              @SWG\Property(property="gender",  type="string", example="M"),
     *              @SWG\Property(property="flag_on",  type="boolean", example="true"),
     *              @SWG\Property(property="cpf",  type="string", example="123.456.789-00"),
     *              @SWG\Property(property="blood_type",  type="string", example="O+"),
     *              @SWG\Property(property="organ_donor",  type="boolean", default="true"),
     *              @SWG\Property(property="assumed_name",  type="string", example="assumed name"),
     *              @SWG\Property(property="flag_pwd",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_visually",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_hearing",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_physically",  type="boolean", default="true"),
     *              @SWG\Property(property="flag_intellectually",  type="boolean", default="true"),
     *              @SWG\Property(property="description_other_pwd",  type="string", example="description other pwd"),
     *              @SWG\Property(property="first_job_ctps",  type="string", example="fjc"),
     *              @SWG\Property(property="first_job_public",  type="string", example="fjp"),
     *              @SWG\Property(property="icd",  type="string", example="1234567893"),
     *              @SWG\Property(property="country_id",  type="integer", example="1"),
     *              @SWG\Property(property="nationality_id",  type="integer", example="1"),
     *              @SWG\Property(property="ethnicity_id",  type="integer", example="1"),
     *              @SWG\Property(property="marital_status_id",  type="integer", example="1"),
     *              @SWG\Property(property="address",
     *                  @SWG\Property(property="id", type="integer", example="51"),
     *                  @SWG\Property(property="neighborhood", type="string", example="neighborhood"),
     *                  @SWG\Property(property="street", type="string", example="street"),
     *                  @SWG\Property(property="street_number", type="string", example="123"),
     *                  @SWG\Property(property="street_type", type="string", example="street type"),
     *                  @SWG\Property(property="zipcode", type="string", example="01234-567"),
     *                  @SWG\Property(property="street_complement", type="string", example="street_complement"),
     *                  @SWG\Property(property="state", type="string", example="AA"),
     *                  @SWG\Property(property="city_id", type="integer", example="51"),
     *              ),
     *              @SWG\Property(property="city",
     *                  @SWG\Property(property="id", type="integer", example="51"),
     *                  @SWG\Property(property="name", type="string", example="name"),
     *                  @SWG\Property(property="state", type="string", example="AA"),
     *                  @SWG\Property(property="code", type="string", example="1234567"),
     *              ),
     *              @SWG\Property(property="telephone",
     *                  @SWG\Property(property="id", type="integer", example="51"),
     *                  @SWG\Property(property="ddd", type="string", example="123"),
     *                  @SWG\Property(property="telephone", type="string", example="(11)1234-5678"),
     *                  @SWG\Property(property="telephone_type", type="string", example="telephone type"),
     *                  @SWG\Property(property="ddi", type="string", example="123"),
     *              ),
     *              @SWG\Property(property="email",
     *                  @SWG\Property(property="id", type="integer", example="51"),
     *                  @SWG\Property(property="email", type="string", example="email@email.com"),
     *                  @SWG\Property(property="email_type", type="string", example="email type"),
     *              ),
     *              @SWG\Property(property="department_id",  type="integer", example="1"),
     *              @SWG\Property(property="dependents", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="id", type="integer", example="51"),
     *                      @SWG\Property(property="name", type="string", example="name"),
     *                      @SWG\Property(property="birth_date", type="string", example="2000-01-01"),
     *                      @SWG\Property(property="cpf", type="string", example="123.456.789-00"),
     *                      @SWG\Property(property="employee_id", type="string", example="51"),
     *                      @SWG\Property(property="dependent_type_id", type="integer", example="1"),
     *                  ),
     *              ),
     *              @SWG\Property(property="education",
     *                  @SWG\Property(property="id", type="integer", example="51"),
     *                  @SWG\Property(property="course", type="string", example="course"),
     *                  @SWG\Property(property="education_level", type="string", example="education level"),
     *                  @SWG\Property(property="education_institution", type="string", example="education institution"),
     *                  @SWG\Property(property="starting_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="finishing_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="employee_id", type="integer", example="51"),
     *              ),
     *              @SWG\Property(property="parentages", type="array",
     *                  @SWG\Items(
     *                      type="object",
     *                      @SWG\Property(property="id", type="integer", example="51"),
     *                      @SWG\Property(property="name", type="string", example="name"),
     *                      @SWG\Property(property="gender", type="string", example="M"),
     *                      @SWG\Property(property="birth_date", type="string", example="2000-01-01"),
     *                      @SWG\Property(property="parentage_type_id", type="integer", example="1"),
     *                  ),
     *              ),
     *              @SWG\Property(property="occupation_id",  type="integer", example="1"),
     *              @SWG\Property(property="identities", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="id", type="integer", example="51"),
     *                      @SWG\Property(property="date_issued", type="string", example="2000-01-01"),
     *                      @SWG\Property(property="description", type="string", example="description"),
     *                      @SWG\Property(property="number", type="string", example="123456789"),
     *                      @SWG\Property(property="series_number", type="string", example="123456789"),
     *                      @SWG\Property(property="state_issued", type="string", example="AA"),
     *                      @SWG\Property(property="zone", type="string", example="zone"),
     *                      @SWG\Property(property="section", type="string", example="abc"),
     *                      @SWG\Property(property="identity_type_id", type="integer", example="1"),
     *                      @SWG\Property(property="issuing_entity_id", type="integer", example="1"),
     *                  ),
     *              ),
     *              @SWG\Property(property="work_contract",
     *                  @SWG\Property(property="id", type="integer", example="51"),
     *                  @SWG\Property(property="hiring_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="end_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="examination_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="dismissal_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="flag_fixed_term", type="string", example="A"),
     *                  @SWG\Property(property="term", type="string", example="1234567890"),
     *                  @SWG\Property(property="new_end_date", type="string", example="2000-01-01"),
     *                  @SWG\Property(property="new_term", type="string", example="1234567890"),
     *                  @SWG\Property(property="contracting_regime_id", type="integer", example="1"),
     *                  @SWG\Property(property="address_id", type="integer", example="51"),
     *                  @SWG\Property(property="employee_id", type="integer", example="51"),
     *
     *              ),
     *              @SWG\Property(property="tax_benefits", type="array",
     *                  @SWG\Items(type="object",
     *                      @SWG\Property(property="id", type="integer", example="51"),
     *                      @SWG\Property(property="name", type="string", example="name"),
     *                      @SWG\Property(property="code", type="string", example="1234567890"),
     *                      @SWG\Property(property="value", type="number", example="1500"),
     *                      @SWG\Property(property="work_contract_id", type="integer", example="51"),
     *                  ),
     *              ),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $address = Address::find($request->input('address.id'));
        $address->update($request->input('address'));

        $city = City::find($request->input('city.id'));
        $city->update($request->input('city'));

        $telephone = Telephone::find($request->input('telephone.id'));
        $telephone->update($request->input('telephone'));

        $email = Email::find($request->input('email.id'));
        $email->update($request->input('email'));

        $dependentsRequest = $request->input('dependents');

        foreach ($dependentsRequest as $dependent) {
            $dependents = Dependent::find($dependent['id']);
            $dependents->update($dependent);
            $dependents->employee()->associate($employee);
        }

        $education = Education::find($request->input('education.id'));
        $education->update($request->input('education'));

        $parentagesRequest = $request->input('parentages');
        foreach ($parentagesRequest as $parentage) {
            $parentages = Parentage::find($parentage['id']);
            $parentages->update($parentage);
            $employee->parentages()->syncWithoutDetaching($parentages);
        }

        $identitiesRequest = $request->input('identities');
        foreach ($identitiesRequest as $identity) {
            $identities = Identity::find($identity['id']);
            $identities->update($identity);
            $employee->identities()->syncWithoutDetaching($identities);
        }

        $workContract = WorkContract::find($request->input('work_contract.id'));
        $workContract->update($request->input('work_contract'));

        $taxBenefitsRequest = $request->input('tax_benefits');
        foreach ($taxBenefitsRequest as $taxBenefit) {
            $taxBenefits = TaxBenefit::find($taxBenefit['id']);
            $taxBenefits->update($taxBenefit);
            $taxBenefits->work_contract()->associate($workContract);
        }

        $employee->update($request->all());

        return new EmployeeResource($employee);
    }

    /**
     * @param Employee $employee
     * @return Response
     *
     * @SWG\Delete(
     *      path="/employees/{id}",
     *      summary="Remove colaborador específico do banco de dados.",
     *      tags={"Employee"},
     *      description="Deleta colaborador pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="employee", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Employee $employee)
    {
        $address = Address::find($employee->address_id);
        $address->delete();

        $city = City::find($employee->city_id);
        $city->delete();

        foreach ($employee->telephones as $telephone) {
            $telephones = Telephone::find($telephone->id);
            $telephones->delete();
        }

        foreach ($employee->emails as $email) {
            $emails = Email::find($email->id);
            $emails->delete();
        }

        foreach ($employee->dependents as $dependent) {
            $dependents = Dependent::find($dependent->id);
            $dependents->delete();
        }

        $education = Education::find($employee->education);
        $education->each->delete();

        foreach ($employee->parentages as $parentage) {
            $parentages = Parentage::find($parentage->id);
            $parentages->delete();
        }

        foreach ($employee->identities as $identity) {
            $identities = Identity::find($identity->id);
            $identities->delete();
        }

        foreach ($employee->tax_benefits as $taxBenefit) {
            $taxBenefits = TaxBenefit::find($taxBenefit->id);
            $taxBenefits->delete();
        }

        $workContract = WorkContract::find($employee->work_contracts);
        $workContract->each->delete();

        $employee->delete();

        return response()->json(['message'=>'Recurso removido com sucesso!']);
    }
}
