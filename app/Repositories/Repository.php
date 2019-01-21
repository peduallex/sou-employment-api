<?php namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * Define o modelo.
     */
    protected $model;

    // Construtor para ligar o modelo ao repositório
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Exibe uma listagem do recurso.
     */
    public function all()
    {
        return $this->model->paginate(10);
    }

    /**
     * Cria um recurso no banco de dados.
     */
    public function create(array $request)
    {
        return $this->model->create($request);
    }

    /**
     * Exibe um recurso específico armazenado no banco de dados.
     */
    public function show(array $data)
    {
        return $this->model-findOrFail($data);
    }

    /**
     * Atualiza um recurso específico do banco de dados.
     */
    public function update(array $request, array $data)
    {
        $record = $this->find($data);
        return $record->update($request);
    }

    /**
     * Remove um recurso específico do banco de dados.
     */
    public function delete(array $data)
    {
        return $this->model->destroy($data);
    }

    /**
     * Recupera o modelo associado
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Atribui o modelo associado
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Relacionamento de banco de dados
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
