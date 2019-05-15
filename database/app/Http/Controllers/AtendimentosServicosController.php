<?php

namespace API\Http\Controllers;

use API\Atendimentos_Servicos;
use API\Repositories\Contracts\AtendimentosServicosRepositoryInterface;
use Illuminate\Http\Request;

class AtendimentosServicosController extends Controller
{
    public function show(AtendimentosServicosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(AtendimentosServicosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(AtendimentosServicosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(AtendimentosServicosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(AtendimentosServicosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
