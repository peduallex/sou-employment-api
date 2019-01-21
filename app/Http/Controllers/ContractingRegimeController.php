<?php

namespace App\Http\Controllers;

use App\Models\ContractingRegime;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ContractingRegimeRequest;
use App\Http\Resources\ContractingRegimeResource;
use App\Repositories\Repository;

class ContractingRegimeController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(ContractingRegime $contractingRegime){

        $this->model = new Repository($contractingRegime);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/contracting-regimes",
     *      summary="Exibe listagem de regimes de contratação.",
     *      tags={"Contracting Regime"},
     *      description="Obter todos os regimes de contratação.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return ContractingRegimeResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param ContractingRegimeRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contracting-regimes",
     *      summary="Armazena regime de contratação recém-criado no banco de dados",
     *      tags={"Contracting Regime"},
     *      description="Armazena um regime de contratação",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(ContractingRegimeRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param ContractingRegime $contractingRegime
     * @return Response
     *
     * @SWG\Get(
     *      path="/contracting-regimes/{id}",
     *      summary="Exibe regime de contratação específico.",
     *      tags={"Contracting Regime"},
     *      description="Obter regime de contratação pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of country", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(ContractingRegime $contractingRegime)
    {
        return new ContractingRegimeResource($contractingRegime);
    }

    /**
     * @param ContractingRegime $contractingRegime
     * @param ContractingRegimeRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contracting-regimes/{id}",
     *      summary="Atualiza regime de contratação específico do banco de dados.",
     *      tags={"Contracting Regime"},
     *      description="Atualiza regime de contratação pelo seu respectivo id.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of country", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(ContractingRegimeRequest $request, ContractingRegime $contractingRegime)
    {
            $contractingRegime->update($request->all());
            return ['Recurso atualizado com sucesso!'];
    }

    /**
     * @param ContractingRegime $contractingRegime
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contracting-regimes/{id}",
     *      summary="Remove regime de contratação específico do banco de dados.",
     *      tags={"Contracting Regime"},
     *      description="Deleta regime de contratação pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of country", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(ContractingRegime $contractingRegime)
    {
            $contractingRegime->delete();
            return ['Recurso removido com sucesso!'];
    }
}
