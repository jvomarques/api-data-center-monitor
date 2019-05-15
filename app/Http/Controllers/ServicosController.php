<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\ServicosRepositoryInterface;
use Illuminate\Http\Request;

class ServicosController extends Controller
{
    public function show(ServicosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(ServicosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(ServicosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(ServicosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(ServicosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
