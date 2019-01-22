<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Repositories\Repository;

class CountryController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Country $country){

        $this->model = new Repository($country);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/countries",
     *      summary="Exibe listagem de países.",
     *      tags={"Country"},
     *      description="Obter todos os países.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return CountryResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param CountryRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/countries",
     *      summary="Armazena país recém-criado no banco de dados",
     *      tags={"Country"},
     *      description="Armazena um país",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Country", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="code",type="string", example="123"),
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="portuguese_name",type="string", example="portuguese name"),
     *              @SWG\Property(property="iso_alfa",type="string", example="ABC"),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(CountryRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param Country $country
     * @return Response
     *
     * @SWG\Get(
     *      path="/countries/{id}",
     *      summary="Exibe país específico.",
     *      tags={"Country"},
     *      description="Obter país pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="country", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    /**
     * @param Country $country
     * @param CountryRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/countries/{id}",
     *      summary="Atualiza país específico do banco de dados.",
     *      tags={"Country"},
     *      description="Atualiza país pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="country", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Country", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="code",type="string", example="123"),
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="portuguese_name",type="string", example="portuguese name"),
     *              @SWG\Property(property="iso_alfa",type="string", example="ABC"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(CountryRequest $request, Country $country)
    {
            $country->update($request->all());
            return new CountryResource($country);
    }

    /**
     * @param Country $country
     * @return Response
     *
     * @SWG\Delete(
     *      path="/countries/{id}",
     *      summary="Remove país específico do banco de dados.",
     *      tags={"Country"},
     *      description="Deleta país pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of country", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Country $country)
    {
            $country->delete();
            return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
