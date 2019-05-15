<?php

namespace API\Http\Controllers;

use API\Marcas;
use API\Repositories\Contracts\MarcasRepositoryInterface;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
   public function show(MarcasRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(MarcasRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(MarcasRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(MarcasRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(MarcasRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
