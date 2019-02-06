<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\EmailRequest;
use App\Http\Resources\EmailResource;
use App\Repositories\Repository;

class EmailController extends Controller
{
    /**
     * Define o modelo.
     */
    protected $model;

    public function __construct(Email $email){

        $this->model = new Repository($email);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/emails",
     *      summary="Exibe listagem de emails.",
     *      tags={"Email"},
     *      description="Obter todos os emails.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return EmailResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Email $email
     * @return Response
     *
     * @SWG\Get(
     *      path="/emails/{id}",
     *      summary="Exibe email específico.",
     *      tags={"Email"},
     *      description="Obter email pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="email", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Email $email)
    {
        return new EmailResource($email);
    }

    /**
     * @param Email $email
     * @param EmailRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/emails/{id}",
     *      summary="Atualiza email específico do banco de dados.",
     *      tags={"Email"},
     *      description="Atualiza email pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="email", type="integer", required=true, in="path"),
     *      @SWG\Parameter(name="Email", in="body",
     *          @SWG\Schema(
     *              @SWG\Property(property="email", type="string", example="email@email.com"),
     *              @SWG\Property(property="email_type", type="string", example="email type"),
     *          ),
     *      ),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function update(EmailRequest $request, Email $email)
    {
            $email->update($request->all());
            return new EmailResource($email);
    }
}
