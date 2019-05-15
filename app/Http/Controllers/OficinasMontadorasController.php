<?php

namespace API\Http\Controllers;

use API\Oficinas_Montadoras;
use API\Repositories\Contracts\OficinasMontadorasRepositoryInterface;
use Illuminate\Http\Request;

class OficinasMontadorasController extends Controller
{
    public function show(OficinasMontadorasRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(OficinasMontadorasRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(OficinasMontadorasRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(OficinasMontadorasRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(OficinasMontadorasRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
