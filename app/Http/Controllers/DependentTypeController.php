<?php

namespace App\Http\Controllers;

use App\Models\DependentType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\DependentTypeRequest;
use App\Http\Resources\DependentTypeResource;
use App\Repositories\Repository;

class DependentTypeController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(DependentType $dependent){

        $this->model = new Repository($dependent);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/dependent-types",
     *      summary="Exibe listagem de tipos de dependentes.",
     *      tags={"Dependent Type"},
     *      description="Obter todos os tipos de dependentes.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return DependentTypeResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param DependentTypeRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/dependent-types",
     *      summary="Armazena tipo de dependente recém-criado no banco de dados",
     *      tags={"Dependent Type"},
     *      description="Armazena um país",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Dependent Type", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(DependentTypeRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param DependentType $dependentType
     * @return Response
     *
     * @SWG\Get(
     *      path="/dependent-types/{id}",
     *      summary="Exibe tipo de dependente específico.",
     *      tags={"Dependent Type"},
     *      description="Obter tipo de dependente pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="dependent type", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(DependentType $dependentType)
    {
        return new DependentTypeResource($dependentType);
    }

    /**
     * @param DependentType $dependentType
     * @param DependentTypeRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/dependent-types/{id}",
     *      summary="Atualiza tipo de dependente específico do banco de dados.",
     *      tags={"Dependent Type"},
     *      description="Atualiza tipo de dependente pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="dependent type", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Dependent Type", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(DependentTypeRequest $request, DependentType $dependentType)
    {
            $dependentType->update($request->all());
            return new DependentTypeResource($dependentType);
    }

    /**
     * @param DependentType $dependentType
     * @return Response
     *
     * @SWG\Delete(
     *      path="/dependent-types/{id}",
     *      summary="Remove tipo de dependente específico do banco de dados.",
     *      tags={"Dependent Type"},
     *      description="Deleta tipo de dependente pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="dependent type", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(DependentType $dependentType)
    {
            $dependentType->delete();
            return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
