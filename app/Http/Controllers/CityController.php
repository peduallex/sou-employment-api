<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
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

    /**
     * @param City $city
     * @param CityRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/cities/{id}",
     *      summary="Atualiza cidade específico do banco de dados.",
     *      tags={"City"},
     *      description="Atualiza cidade pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="city", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="City", in="body",
     *          @SWG\Schema(
     *                  @SWG\Property(property="name", type="string", example="name"),
     *                  @SWG\Property(property="state", type="string", example="AA"),
     *                  @SWG\Property(property="code", type="string", example="1234567"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(CityRequest $request, City $city)
    {
            $city->update($request->all());
            return new CityResource($city);
    }
}
