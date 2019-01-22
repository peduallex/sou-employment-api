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
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Occupation", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="code",type="string", example="12345678901234567890"),
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="political_office",type="string", example="P"),
     *              @SWG\Property(property="educational_level_required",type="string", example="educational"),
     *              @SWG\Property(property="responsible_entity",type="string", example="R"),
     *              @SWG\Property(property="cbo_code",type="string", example="12345678901234567890"),
     *          ),
     *      ),
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
     *      @SWG\Parameter(name="id", description="occupation", type="integer", required=true, in="path"),
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
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="occupation", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Occupation", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="code",type="string", example="12345678901234567890"),
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="political_office",type="string", example="P"),
     *              @SWG\Property(property="educational_level_required",type="string", example="educational"),
     *              @SWG\Property(property="responsible_entity",type="string", example="R"),
     *              @SWG\Property(property="cbo_code",type="string", example="12345678901234567890"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(OccupationRequest $request, Occupation $occupation)
    {
        $occupation->update($request->all());
        return new OccupationResource($occupation);
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
     *      @SWG\Parameter(name="id", description="occupation", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Occupation $occupation)
    {
        $occupation->delete();
        return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
