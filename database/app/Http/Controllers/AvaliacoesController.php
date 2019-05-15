<?php

namespace API\Http\Controllers;

use API\Avaliacoes;
use API\Repositories\Contracts\AvaliacoesRepositoryInterface;
use Illuminate\Http\Request;

class AvaliacoesController extends Controller
{
    public function show(AvaliacoesRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(AvaliacoesRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(AvaliacoesRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(AvaliacoesRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(AvaliacoesRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
