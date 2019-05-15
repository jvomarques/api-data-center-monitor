<?php

namespace API\Http\Controllers;

use API\Comissoes;
use API\Repositories\Contracts\ComissoesRepositoryInterface;
use Illuminate\Http\Request;

class ComissoesController extends Controller
{
    public function show(ComissoesRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(ComissoesRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(ComissoesRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(ComissoesRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(ComissoesRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
