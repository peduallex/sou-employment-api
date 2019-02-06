<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EducationRequest;
use App\Http\Resources\EducationResource;
use App\Repositories\Repository;

class EducationController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Education $education){

        $this->model = new Repository($education);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/education",
     *      summary="Exibe listagem de escolaridades.",
     *      tags={"Education"},
     *      description="Obter todas as escolaridades.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return EducationResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Education $education
     * @return Response
     *
     * @SWG\Get(
     *      path="/education/{id}",
     *      summary="Exibe escolaridade específica.",
     *      tags={"Education"},
     *      description="Obter escolaridade pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="education", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Education $education)
    {
        return new EducationResource($education);
    }
}
