<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CityResource;
use App\Repositories\Repository;

class CityController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(City $city){

        $this->model = new Repository($city);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/cities",
     *      summary="Exibe listagem de cidades.",
     *      tags={"City"},
     *      description="Obter todas as cidades.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return CityResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param City $city
     * @return Response
     *
     * @SWG\Get(
     *      path="/cities/{id}",
     *      summary="Exibe cidade específica.",
     *      tags={"City"},
     *      description="Obter cidade pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="city", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }
}
