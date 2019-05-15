<?php

namespace API\Http\Controllers;

use API\Cores;
use API\Repositories\Contracts\CoresRepositoryInterface;
use Illuminate\Http\Request;

class CoresController extends Controller
{
    public function show(CoresRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(CoresRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(CoresRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(CoresRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(CoresRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
