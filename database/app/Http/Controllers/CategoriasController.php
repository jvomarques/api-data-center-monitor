<?php

namespace API\Http\Controllers;

use API\Categorias;
use API\Repositories\Contracts\CategoriasRepositoryInterface;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(CategoriasRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(CategoriasRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(CategoriasRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(CategoriasRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(CategoriasRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
