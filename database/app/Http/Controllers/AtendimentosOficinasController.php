<?php

namespace API\Http\Controllers;

use API\Atendimentos_Oficinas;
use API\Repositories\Contracts\AtendimentosOficinasRepositoryInterface;
use Illuminate\Http\Request;

class AtendimentosOficinasController extends Controller
{
    public function show(AtendimentosOficinasRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(AtendimentosOficinasRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(AtendimentosOficinasRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(AtendimentosOficinasRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(AtendimentosOficinasRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
