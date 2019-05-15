<?php

namespace API\Http\Controllers;

use API\Situacoes;
use API\Repositories\Contracts\SituacoesRepositoryInterface;
use Illuminate\Http\Request;

class SituacoesController extends Controller
{
    public function show(SituacoesRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(SituacoesRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(SituacoesRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(SituacoesRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(SituacoesRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
