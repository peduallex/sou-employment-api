<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\NationalityRequest;
use App\Http\Resources\NationalityResource;
use App\Repositories\Repository;

class NationalityController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Nationality $nationality){

        $this->model = new Repository($nationality);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/nationalities",
     *      summary="Exibe listagem de nacionalidades.",
     *      tags={"Nacionality"},
     *      description="Obter todas as nacionalidades.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return NationalityResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param NationalityRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/nationalities",
     *      summary="Armazena nacionalidade recém-criado no banco de dados",
     *      tags={"Nacionality"},
     *      description="Armazena uma nacionalidade",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(NationalityRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param Nationality $nationality
     * @return Response
     *
     * @SWG\Get(
     *      path="/nationalities/{id}",
     *      summary="Exibe nacionalidade específica.",
     *      tags={"Nacionality"},
     *      description="Obter nacionalidade pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of nacionality", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Nationality $nationality)
    {
        return new NationalityResource($nationality);
    }

    /**
     * @param Nationality $nationality
     * @param NationalityRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/nationalities/{id}",
     *      summary="Atualiza nacionalidade específica do banco de dados.",
     *      tags={"Nacionality"},
     *      description="Atualiza nacionalidade pelo seu respectivo id.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of nacionality", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(NationalityRequest $request, Nationality $nationality)
    {
            $nationality->update($request->all());
            return ['Recurso atualizado com sucesso!'];
    }

    /**
     * @param Nationality $nationality
     * @return Response
     *
     * @SWG\Delete(
     *      path="/nationalities/{id}",
     *      summary="Remove nacionalidade específica do banco de dados.",
     *      tags={"Nacionality"},
     *      description="Deleta nacionalidade pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of nacionality", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Nationality $nationality)
    {
         $nationality->delete();
         return ['Recurso removido com sucesso!'];
    }
}
