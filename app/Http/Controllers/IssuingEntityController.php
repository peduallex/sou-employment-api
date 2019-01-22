<?php

namespace App\Http\Controllers;

use App\Models\IssuingEntity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\IssuingEntityRequest;
use App\Http\Resources\IssuingEntityResource;
use App\Repositories\Repository;

class IssuingEntityController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(IssuingEntity $issuingEntity){

        $this->model = new Repository($issuingEntity);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/issuing-entities",
     *      summary="Exibe listagem de entidades emissoras.",
     *      tags={"Issuing Entity"},
     *      description="Obter todas as entidades emissoras.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return IssuingEntityResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param IssuingEntityRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/issuing-entities",
     *      summary="Armazena entidade emissora recém-criada no banco de dados",
     *      tags={"Issuing Entity"},
     *      description="Armazena uma entidade emissora",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Issuing Entity", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(IssuingEntityRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param IssuingEntity $issuingEntity
     * @return Response
     *
     * @SWG\Get(
     *      path="/issuing-entities/{id}",
     *      summary="Exibe entidade emissora específica.",
     *      tags={"Issuing Entity"},
     *      description="Obter entidade emissora pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="issuing entity", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(IssuingEntity $issuingEntity)
    {
        return new IssuingEntityResource($issuingEntity);
    }

    /**
     * @param IssuingEntity $issuingEntity
     * @param IssuingEntityRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/issuing-entities/{id}",
     *      summary="Atualiza entidade emissora específica do banco de dados.",
     *      tags={"Issuing Entity"},
     *      description="Atualiza entidade emissora pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="issuing entity", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Issuing Entity", in="body",
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
    public function update(IssuingEntityRequest $request, IssuingEntity $issuingEntity)
    {
        $issuingEntity->update($request->all());
        return new IssuingEntityResource($issuingEntity);
    }

    /**
     * @param IssuingEntity $issuingEntity
     * @return Response
     *
     * @SWG\Delete(
     *      path="/issuing-entities/{id}",
     *      summary="Remove entidade emissora específica do banco de dados.",
     *      tags={"Issuing Entity"},
     *      description="Deleta entidade emissora pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="issuing entity", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(IssuingEntity $issuingEntity)
    {
        $issuingEntity->delete();
        return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
