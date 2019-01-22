<?php

namespace App\Http\Controllers;

use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MaritalStatusRequest;
use App\Http\Resources\MaritalStatusResource;
use App\Repositories\Repository;

class MaritalStatusController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(MaritalStatus $maritalStatus){

        $this->model = new Repository($maritalStatus);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/marital-statuses",
     *      summary="Exibe listagem de estados civis.",
     *      tags={"Marital Status"},
     *      description="Obter todos os estados civis.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return MaritalStatusResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param MaritalStatusRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/marital-statuses",
     *      summary="Armazena estado civil recém-criado no banco de dados",
     *      tags={"Marital Status"},
     *      description="Armazena um estado civil",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Marital Status", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(MaritalStatusRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param MaritalStatus $maritalStatus
     * @return Response
     *
     * @SWG\Get(
     *      path="/marital-statuses/{id}",
     *      summary="Exibe estado civil específico.",
     *      tags={"Marital Status"},
     *      description="Obter estado civil pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="marital status", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(MaritalStatus $maritalStatus)
    {
        return new MaritalStatusResource($maritalStatus);
    }

    /**
     * @param MaritalStatus $maritalStatus
     * @param MaritalStatusRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/marital-statuses/{id}",
     *      summary="Atualiza estado civil específico do banco de dados.",
     *      tags={"Marital Status"},
     *      description="Atualiza estado civil pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="marital status", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Marital Status", in="body",
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
    public function update(MaritalStatusRequest $request, MaritalStatus $maritalStatus)
    {
        $maritalStatus->update($request->all());
        return new MaritalStatusResource($maritalStatus);
    }

    /**
     * @param MaritalStatus $maritalStatus
     * @return Response
     *
     * @SWG\Delete(
     *      path="/marital-statuses/{id}",
     *      summary="Remove estado civil específico do banco de dados.",
     *      tags={"Marital Status"},
     *      description="Deleta estado civil pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="marital status", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(MaritalStatus $maritalStatus)
    {
        $maritalStatus->delete();
        return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
