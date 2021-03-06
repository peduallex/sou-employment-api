<?php

namespace App\Http\Controllers;

use App\Models\Telephone;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\TelephoneRequest;
use App\Http\Resources\TelephoneResource;
use App\Repositories\Repository;

class TelephoneController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Telephone $telephone){

        $this->model = new Repository($telephone);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/telephones",
     *      summary="Exibe listagem de telefones.",
     *      tags={"Telephone"},
     *      description="Obter todos os telefones.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return TelephoneResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Telephone $telephone
     * @return Response
     *
     * @SWG\Get(
     *      path="/telephones/{id}",
     *      summary="Exibe telefone específico.",
     *      tags={"Telephone"},
     *      description="Obter telefone pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="telephone", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Telephone $telephone)
    {
        return new TelephoneResource($telephone);
    }
}
