<?php namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function create(array $request);

    public function show(array $data);

    public function update(array $request, array $data);

    public function delete(array $data);
}
