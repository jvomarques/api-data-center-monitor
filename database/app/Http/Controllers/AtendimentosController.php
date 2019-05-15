<?php

namespace API\Http\Controllers;

use API\Atendimentos;
use API\Repositories\Contracts\AtendimentosRepositoryInterface;
use Illuminate\Http\Request;

class AtendimentosController extends Controller
{
    public function show(AtendimentosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(AtendimentosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(AtendimentosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(AtendimentosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(AtendimentosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
