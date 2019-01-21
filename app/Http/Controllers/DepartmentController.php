<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Repositories\Repository;

class DepartmentController extends Controller
{

    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Department $department){

        $this->model = new Repository($department);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/departments",
     *      summary="Exibe listagem de departamentos.",
     *      tags={"Department"},
     *      description="Obter todos os departamentos.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return DepartmentResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param DepartmentRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/departments",
     *      summary="Armazena departamento recém-criado no banco de dados",
     *      tags={"Department"},
     *      description="Armazena um departamento",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="code", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Response(response=201, description="Recurso criado com sucesso."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function store(DepartmentRequest $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * @param Department $department
     * @return Response
     *
     * @SWG\Get(
     *      path="/departments/{id}",
     *      summary="Exibe departamento específico.",
     *      tags={"Department"},
     *      description="Obter departamento pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of department", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Department $department)
    {
        return new DepartmentResource($department);
    }

    /**
     * @param Department $department
     * @param DepartmentRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/departments/{id}",
     *      summary="Atualiza departamento específico do banco de dados.",
     *      tags={"Department"},
     *      description="Atualiza departamento pelo seu respectivo id.",
     *      consumes={"application/x-www-form-urlencoded"},
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of department", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="code", in="formData", required=true, type="string"),
     *      @SWG\Parameter(name="name", in="formData", required=true, type="string"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(DepartmentRequest $request, Department $department)
    {
            $department->update($request->all());
            return new DepartmentResource($department);
    }

    /**
     * @param Department $department
     * @return Response
     *
     * @SWG\Delete(
     *      path="/departments/{id}",
     *      summary="Remove departamento específico do banco de dados.",
     *      tags={"Department"},
     *      description="Deleta departamento pelo seu respectivo id",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of department", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function destroy(Department $department)
    {
            $department->delete();
            return ['Recurso removido com sucesso!'];
    }
}
