<?php

namespace App\Http\Controllers;

use App\Models\ParentageType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ParentageTypeResource;
use App\Repositories\Repository;

class ParentageTypeController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(ParentageType $parentageType){

        $this->model = new Repository($parentageType);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/parentage-types",
     *      summary="Exibe listagem de tipos de parentesco.",
     *      tags={"Parentage Type"},
     *      description="Obter todos os tipos de parentesco.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return ParentageTypeResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/parentage-types",
     *      summary="Armazena tipo de parentesco recém-criado no banco de dados",
     *      tags={"Parentage Type"},
     *      description="Armazena um tipo de parentesco",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Parentage Type", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(Request $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param ParentageType $parentageType
     * @return Response
     *
     * @SWG\Get(
     *      path="/parentage-types/{id}",
     *      summary="Exibe tipo de parentesco específico.",
     *      tags={"Parentage Type"},
     *      description="Obter tipo de parentesco pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="parentage type", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(ParentageType $parentageType)
    {
        return new ParentageTypeResource($parentageType);
    }

    /**
     * @param ParentageType $parentageType
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parentage-types/{id}",
     *      summary="Atualiza tipo de parentesco específico do banco de dados.",
     *      tags={"Parentage Type"},
     *      description="Atualiza tipo de parentesco pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="parentage type", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Parentage Type", in="body",
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
    public function update(Request $request, ParentageType $parentageType)
    {
        $parentageType->update($request->all());
        return new ParentageTypeResource($parentageType);
    }

    /**
     * @param ParentageType $parentageType
     * @return Response
     *
     * @SWG\Delete(
     *      path="/parentage-types/{id}",
     *      summary="Remove tipo de parentesco específico do banco de dados.",
     *      tags={"Parentage Type"},
     *      description="Deleta tipo de parentesco pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="parentage type", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(ParentageType $parentageType)
    {
        $parentageType->delete();
        return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
