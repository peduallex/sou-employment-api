<?php

namespace App\Http\Controllers;

use App\Models\WorkContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\WorkContractRequest;
use App\Http\Resources\WorkContractResource;
use App\Repositories\Repository;

class WorkContractController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(WorkContract $workContract){

        $this->model = new Repository($workContract);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/work-contracts",
     *      summary="Exibe listagem de contratos de trabalho.",
     *      tags={"Work Contract"},
     *      description="Obter todos os contratos de trabalho.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return WorkContractResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param WorkContract $workContract
     * @return Response
     *
     * @SWG\Get(
     *      path="/work-contracts/{id}",
     *      summary="Exibe contrato de trabalho específico.",
     *      tags={"Work Contract"},
     *      description="Obter contrato de trabalho pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of work contract", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(WorkContract $workContract)
    {
        return new WorkContractResource($workContract);
    }
}
