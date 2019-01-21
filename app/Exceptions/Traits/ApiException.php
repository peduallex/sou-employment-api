<?php

namespace App\Exceptions\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

trait ApiException {

  /**
   * Trata as exceções da API
   *
   * @param [type] $request
   * @param [type] $e
   * @return void
   */
  protected function getJsonException($request, $e)
  {
      if ($e instanceof ModelNotFoundException) {
          return $this->notFoundException();
      }

      if ($e instanceof HttpException) {
          return $this->httpException($e);
      }

      if ($e instanceof AccessDeniedHttpException) {
        return $this->accessDeniedException($e);
      }

      if ($e instanceof ValidationException) {
        return $this->validationException($e);
      }

      return $this->genericException();
  }

  /**
   * Retornar o erro 403 (cliente)
   *
   * @return void
   */
  protected function accessDeniedException($e)
  {
      return $this->getResponse(
          "Recurso Proibido",
          "03",
          $e->getStatusCode()          
      );
  }  

  /**
   * Retornar o erro 404 (cliente)
   *
   * @return void
   */
  protected function notFoundException()
  {
      return $this->getResponse(
          "Recurso não encontrado",
          "04",
          404
      );
  }    

  /**
   * Retornar o erro 405 (cliente)
   *
   * @return void
   */
  protected function httpException($e)
  {
      return $this->getResponse(
          "Verbo Http não permitido",
          "05",
          $e->getStatusCode()
      );
  }

  /**
   * Retornar o erro 422 (validação)
   *
   * @return void
   */
  protected function validationException($e)
  {
      return response()->json($e->errors(), $e->status);
  }

  /**
   * Retornar o erro 500 (servidor)
   *
   * @return void
   */
  protected function genericException()
  {
      return $this->getResponse(
          "Erro interno no servidor",
          "00",
          500
      );
  }

  /**
   * Mostra a resposta em json
   *
   * @param [type] $message
   * @param [type] $code
   * @param [type] $status
   * @return void
   */
  protected function getResponse($message, $code, $status)
  {
      return response()->json([
          "errors" => [
              [
                  "status" => $status,
                  "code" => $code,
                  "message" => $message
              ]
          ]
      ], $status);
  }

}