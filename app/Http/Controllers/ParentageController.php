<?php

namespace App\Http\Controllers;

use App\Models\Parentage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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
     *      summary="Exibe listagem de filiações.",
     *      tags={"Parentage"},
     *      description="Obter todas as filiações.",
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
     *      summary="Exibe filiação específico.",
     *      tags={"Parentage"},
     *      description="Obter filiação pelo seu respectivo id.",
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

    /**
     * @param Parentage $parentage
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/parentages/{id}",
     *      summary="Atualiza filiação específico do banco de dados.",
     *      tags={"Parentage"},
     *      description="Atualiza filiação pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="parentage", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Parentage", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name", type="string", example="name"),
     *              @SWG\Property(property="gender", type="string", example="M"),
     *              @SWG\Property(property="birth_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="parentage_type_id", type="integer", example="1"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, Parentage $parentage)
    {
            $parentage->update($request->all());
            return new ParentageResource($parentage);
    }
}
