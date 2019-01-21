<?php

namespace App\Http\Controllers;

use App\Models\Occupation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\OccupationRequest;
use App\Http\Resources\OccupationResource;
use App\Repositories\Repository;

class OccupationController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Occupation $occupation){

        $this->model = new Repository($occupation);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/occupations",
     *      summary="Exibe listagem de ocupações.",
     *      tags={"Occupation"},
     *      description="Obter todas as ocupações.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return OccupationResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param OccupationRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/occupations",
     *      summary="Armazena ocupação recém-criada no banco de dados",
     *      tags={"Occupation"},
     *      description="Armazena uma ocupação",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="code", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="political_office", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="educational_level_required", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="responsible_entity", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="cbo_code", in="formData", required=true, type="string"),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(OccupationRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param Occupation $occupation
     * @return Response
     *
     * @SWG\Get(
     *      path="/occupations/{id}",
     *      summary="Exibe ocupação específica.",
     *      tags={"Occupation"},
     *      description="Obter ocupação pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of occupation", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Occupation $occupation)
    {
        return new OccupationResource($occupation);
    }

    /**
     * @param Occupation $occupation
     * @param OccupationRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/occupations/{id}",
     *      summary="Atualiza ocupação específica do banco de dados.",
     *      tags={"Occupation"},
     *      description="Atualiza ocupação pelo seu respectivo id.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of occupation", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="code", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="political_office", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="educational_level_required", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="responsible_entity", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="cbo_code", in="formData", required=true, type="string"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(OccupationRequest $request, Occupation $occupation)
    {
        $occupation->update($request->all());
        return ['Recurso atualizado com sucesso!'];
    }

    /**
     * @param Occupation $occupation
     * @return Response
     *
     * @SWG\Delete(
     *      path="/occupations/{id}",
     *      summary="Remove ocupação específica do banco de dados.",
     *      tags={"Occupation"},
     *      description="Deleta ocupação pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of occupation", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Occupation $occupation)
    {
        $occupation->delete();
        return ['Recurso removido com sucesso!'];
    }
}
