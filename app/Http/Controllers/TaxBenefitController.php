<?php

namespace App\Http\Controllers;

use App\Models\TaxBenefit;
use App\Models\TaxBenefitWorkContract;
use App\Models\WorkContract;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\TaxBenefitRequest;
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
     *      summary="Exibe listagem de benefícios fiscais.",
     *      tags={"TaxBenefit"},
     *      description="Obter todos os benefícios fiscais.",
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
     *      summary="Exibe benefício fiscal específico.",
     *      tags={"TaxBenefit"},
     *      description="Obter benefício fiscal pelo seu respectivo id.",
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
}
