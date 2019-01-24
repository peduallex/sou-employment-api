<?php

namespace App\Http\Controllers;

use App\Models\IdentityType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\IdentityTypeResource;
use App\Repositories\Repository;

class IdentityTypeController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(IdentityType $identityType){

        $this->model = new Repository($identityType);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/identity-types",
     *      summary="Exibe listagem de tipos de documentos.",
     *      tags={"Identity Type"},
     *      description="Obter todos os tipos de documentos.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return IdentityTypeResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/identity-types",
     *      summary="Armazena tipo de documento recém-criado no banco de dados",
     *      tags={"Identity Type"},
     *      description="Armazena um tipo de documento",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Identity Type", in="body",
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
     * @param IdentityType $identityType
     * @return Response
     *
     * @SWG\Get(
     *      path="/identity-types/{id}",
     *      summary="Exibe tipo de documento específico.",
     *      tags={"Identity Type"},
     *      description="Obter tipo de documento pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="identity type", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(IdentityType $identityType)
    {
        return new IdentityTypeResource($identityType);
    }

    /**
     * @param IdentityType $identityType
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/identity-types/{id}",
     *      summary="Atualiza tipo de documento específico do banco de dados.",
     *      tags={"Identity Type"},
     *      description="Atualiza tipo de documento pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="identity type", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Identity Type", in="body",
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
    public function update(Request $request, IdentityType $identityType)
    {
        $identityType->update($request->all());
        return new IdentityTypeResource($identityType);
    }

    /**
     * @param IdentityType $identityType
     * @return Response
     *
     * @SWG\Delete(
     *      path="/identity-types/{id}",
     *      summary="Remove tipo de documento específico do banco de dados.",
     *      tags={"Identity Type"},
     *      description="Deleta tipo de documento pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="identity type", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(IdentityType $identityType)
    {
        $identityType->delete();
        return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
