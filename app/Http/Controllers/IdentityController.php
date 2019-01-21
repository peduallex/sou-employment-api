<?php

namespace App\Http\Controllers;

use App\Models\Identity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\IdentityRequest;
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
     *      @SWG\Parameter(name="id", description="id of identity", type="integer", required=true, in="path"),
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
}
