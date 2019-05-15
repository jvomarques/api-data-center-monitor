<?php

namespace API\Http\Controllers;

use API\Oficinas_Servicos;
use API\Repositories\Contracts\OficinasServicosRepositoryInterface;
use Illuminate\Http\Request;

class OficinasServicosController extends Controller
{
    public function show(OficinasServicosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(OficinasServicosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(OficinasServicosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(OficinasServicosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(OficinasServicosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
