<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\IdentityResource;
use App\Repositories\Repository;

class IdentityController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Identity $identity){

        $this->model = new Repository($identity);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/identities",
     *      summary="Exibe listagem de documentos.",
     *      tags={"Identity"},
     *      description="Obter todos os documentos.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return IdentityResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Identity $identity
     * @return Response
     *
     * @SWG\Get(
     *      path="/identities/{id}",
     *      summary="Exibe documento específico.",
     *      tags={"Identity"},
     *      description="Obter documento pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="identity", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Identity $identity)
    {
        return new IdentityResource($identity);
    }

    /**
     * @param Identity $identity
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/identities/{id}",
     *      summary="Atualiza documento específico do banco de dados.",
     *      tags={"Identity"},
     *      description="Atualiza documento pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="identity", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Identity", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="date_issued", type="string", example="2000-01-01"),
     *              @SWG\Property(property="description", type="string", example="description"),
     *              @SWG\Property(property="number", type="string", example="123456789"),
     *              @SWG\Property(property="series_number", type="string", example="123456789"),
     *              @SWG\Property(property="state_issued", type="string", example="AA"),
     *              @SWG\Property(property="zone", type="string", example="zone"),
     *              @SWG\Property(property="section", type="string", example="abc"),
     *              @SWG\Property(property="identity_type_id", type="integer", example="1"),
     *              @SWG\Property(property="issuing_entity_id", type="integer", example="1"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, Identity $identity)
    {
            $identity->update($request->all());
            return new IdentityResource($identity);
    }
}
