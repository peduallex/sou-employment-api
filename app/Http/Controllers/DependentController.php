<?php

namespace App\Http\Controllers;

use App\Models\Dependent;
use App\Models\Employee;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DependentResource;
use App\Repositories\Repository;

class DependentController extends Controller
{

    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Dependent $dependent){

        $this->model = new Repository($dependent);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/dependents",
     *      summary="Exibe listagem de dependentes.",
     *      tags={"Dependent"},
     *      description="Obter todos os dependentes.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return DependentResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Dependent $dependent
     * @return Response
     *
     * @SWG\Get(
     *      path="/dependents/{id}",
     *      summary="Exibe dependente específico.",
     *      tags={"Dependent"},
     *      description="Obter dependente pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="dependent", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Dependent $dependent)
    {
        return new DependentResource($dependent);
    }

    /**
     * @param Dependent $dependent
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/dependents/{id}",
     *      summary="Atualiza dependente específico do banco de dados.",
     *      tags={"Dependent"},
     *      description="Atualiza dependente pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="dependent", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Dependent", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name", type="string", example="name"),
     *              @SWG\Property(property="birth_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="cpf", type="string", example="123.456.789-00"),
     *              @SWG\Property(property="employee_id", type="string", example="1"),
     *              @SWG\Property(property="dependent_type_id", type="integer", example="1"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, Dependent $dependent)
    {
            $dependent->update($request->all());
            return new DependentResource($dependent);
    }
}
