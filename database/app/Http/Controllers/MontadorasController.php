<?php

namespace API\Http\Controllers;

use API\Montadoras;
use API\Repositories\Contracts\MontadorasRepositoryInterface;
use Illuminate\Http\Request;

class MontadorasController extends Controller
{
    public function show(MontadorasRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(MontadorasRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(MontadorasRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(MontadorasRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(MontadorasRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
