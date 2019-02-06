<?php

namespace App\Http\Controllers;

use App\Models\Parentage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ParentageRequest;
use App\Http\Resources\ParentageResource;
use App\Repositories\Repository;

class ParentageController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Parentage $parentage){

        $this->model = new Repository($parentage);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/parentages",
     *      summary="Exibe listagem de parentescos.",
     *      tags={"Parentage"},
     *      description="Obter todos os parentescos.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return ParentageResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Parentage $parentage
     * @return Response
     *
     * @SWG\Get(
     *      path="/parentages/{id}",
     *      summary="Exibe parentesco específico.",
     *      tags={"Parentage"},
     *      description="Obter parentesco pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="parentage", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Parentage $parentage)
    {
        return new ParentageResource($parentage);
    }
}
