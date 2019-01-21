<?php

/**
 * @SWG\Swagger(
 *     basePath="/api",
 *     schemes={"http"},
 *     host=L5_SWAGGER_CONST_HOST,
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="SOU (Employment).",
 *         description="API de colaboradores (UNIVESP).",
 *         @SWG\Contact(
 *             email="eduardo.ferreira@connectcom.univesp.br"
 *         ),
 *     )
 * )
 */

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\AddressResource;
use App\Repositories\Repository;

class AddressController extends Controller
{
  /**
   * Define o modelo.
   */
    protected $model;

    public function __construct(Address $address){

        $this->model = new Repository($address);
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/addresses",
     *      summary="Exibe listagem de endereços.",
     *      tags={"Address"},
     *      description="Obter todos os endereços.",
     *      produces={"application/json"},
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),     *
     * )
     */
    public function index()
    {
        return AddressResource::collection($this->model->all())->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Address $address
     * @return Response
     *
     * @SWG\Get(
     *      path="/addresses/{id}",
     *      summary="Exibe endereço específico.",
     *      tags={"Address"},
     *      description="Obter endereço pelo seu respectivo id.",
     *      produces={"application/json"},
     *      @SWG\Parameter(name="id", description="id of address", type="integer", required=true, in="path"),
     *      @SWG\Response(response=200, description="Operação bem sucedida."),
     *      @SWG\Response(response=400, description="Solicitação inválida."),
     *      @SWG\Response(response=404, description="Recurso não encontrado."),
     *      @SWG\Response(response=500, description="Erro interno no servidor."),
     * )
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }
}
