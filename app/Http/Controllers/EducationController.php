<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @param Education $education
     * @param Request $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/education/{id}",
     *      summary="Atualiza escolaridade específica do banco de dados.",
     *      tags={"Education"},
     *      description="Atualiza escolaridade pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="education", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Education", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="course", type="string", example="course"),
     *              @SWG\Property(property="education_level", type="string", example="education level"),
     *              @SWG\Property(property="education_institution", type="string", example="education institution"),
     *              @SWG\Property(property="starting_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="finishing_date", type="string", example="2000-01-01"),
     *              @SWG\Property(property="employee_id", type="integer", example="1"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(Request $request, Education $education)
    {
            $education->update($request->all());
            return new EducationResource($education);
    }
}
