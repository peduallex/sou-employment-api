<?php

namespace App\Http\Controllers;

use App\Models\Ethnicity;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\EthnicityResource;
use App\Repositories\Repository;

class EthnicityController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Ethnicity $ethnicity){

        $this->model = new Repository($ethnicity);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/ethnicities",
     *      summary="Exibe listagem de etnias.",
     *      tags={"Ethnicity"},
     *      description="Obter todas as etnias.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return EthnicityResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ethnicities",
     *      summary="Armazena etnia recém-criada no banco de dados",
     *      tags={"Ethnicity"},
     *      description="Armazena uma etnia",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="Ethnicity", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="description",type="string", example="description"),
     *          ),
     *      ),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(Request $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param Ethnicity $ethnicity
     * @return Response
     *
     * @SWG\Get(
     *      path="/ethnicities/{id}",
     *      summary="Exibe etnia específica.",
     *      tags={"Ethnicity"},
     *      description="Obter etnia pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="ethnicity", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Ethnicity $ethnicity)
    {
        return new EthnicityResource($ethnicity);
    }

    /**
     * @param Ethnicity $ethnicity
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ethnicities/{id}",
     *      summary="Atualiza etnia específica do banco de dados.",
     *      tags={"Ethnicity"},
     *      description="Atualiza etnia pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="ethnicity", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Ethnicity", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="name",type="string", example="name"),
     *              @SWG\Property(property="description",type="string", example="description"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, Ethnicity $ethnicity)
    {
        $ethnicity->update($request->all());
        return new EthnicityResource($ethnicity);
    }

    /**
     * @param Ethnicity $ethnicity
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ethnicities/{id}",
     *      summary="Remove etnia específica do banco de dados.",
     *      tags={"Ethnicity"},
     *      description="Deleta etnia pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="ethnicity", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Ethnicity $ethnicity)
    {
        $ethnicity->delete();
        return response()->json(['message' => 'Recurso removido com sucesso!']);
    }
}
