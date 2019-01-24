<?php

namespace App\Http\Controllers;

use App\Models\TaxBenefit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\TaxBenefitResource;
use App\Repositories\Repository;

class TaxBenefitController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(TaxBenefit $taxBenefit){

        $this->model = new Repository($taxBenefit);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/tax-benefits",
     *      summary="Exibe listagem de benefícios.",
     *      tags={"TaxBenefit"},
     *      description="Obter todos os benefícios.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return TaxBenefitResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param TaxBenefit $taxBenefit
     * @return Response
     *
     * @SWG\Get(
     *      path="/tax-benefits/{id}",
     *      summary="Exibe benefício específico.",
     *      tags={"TaxBenefit"},
     *      description="Obter benefício pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="tax benefit", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(TaxBenefit $taxBenefit)
    {
        return new TaxBenefitResource($taxBenefit);
    }

    /**
     * @param TaxBenefit $taxBenefit
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tax-benefits/{id}",
     *      summary="Atualiza benefício específico do banco de dados.",
     *      tags={"TaxBenefit"},
     *      description="Atualiza benefício pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="tax benefit", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="TaxBenefit", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name", type="string", example="name"),
     *              @SWG\Property(property="code", type="string", example="1234567890"),
     *              @SWG\Property(property="value", type="number", example="1500"),
     *              @SWG\Property(property="work_contract_id", type="integer", example="1"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, TaxBenefit $taxBenefit)
    {
            $taxBenefit->update($request->all());
            return new TaxBenefitResource($taxBenefit);
    }
}
