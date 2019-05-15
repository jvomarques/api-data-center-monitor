<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\CidadesRepositoryInterface;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function show(CidadesRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(CidadesRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(CidadesRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(CidadesRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(CidadesRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}