<?php

namespace API\Http\Controllers;

use API\Modelos;
use API\Repositories\Contracts\ModelosRepositoryInterface;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    public function show(ModelosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(ModelosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(ModelosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(ModelosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(ModelosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
