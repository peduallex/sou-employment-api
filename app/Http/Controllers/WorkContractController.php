<?php

namespace App\Http\Controllers;

use App\Models\WorkContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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
     *      summary="Exibe listagem de contratos.",
     *      tags={"Work Contract"},
     *      description="Obter todos os contratos.",
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
     *      summary="Exibe contrato específico.",
     *      tags={"Work Contract"},
     *      description="Obter contrato pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="work contract", type="integer", required=true, in="path"),
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

    /**
     * @param WorkContract $workContract
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/work-contracts/{id}",
     *      summary="Atualiza contrato específico do banco de dados.",
     *      tags={"Work Contract"},
     *      description="Atualiza contrato pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="work contract", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="WorkContract", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="hiring_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="end_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="examination_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="dismissal_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="flag_fixed_term", type="string", example="A"),
     *              @SWG\Property(property="term", type="string", example="1234567890"),
     *              @SWG\Property(property="new_end_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="new_term", type="string", example="1234567890"),
     *              @SWG\Property(property="contracting_regime_id", type="integer", example="1"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, WorkContract $workContract)
    {
            $workContract->update($request->all());
            return new WorkContractResource($workContract);
    }
}
