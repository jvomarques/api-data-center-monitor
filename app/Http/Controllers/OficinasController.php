<?php

namespace API\Http\Controllers;

use API\Oficinas;
use API\Repositories\Contracts\OficinasRepositoryInterface;
use Illuminate\Http\Request;

class OficinasController extends Controller
{
    public function show(OficinasRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(OficinasRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(OficinasRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(OficinasRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(OficinasRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
