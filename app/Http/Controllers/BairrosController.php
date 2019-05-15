<?php

namespace API\Http\Controllers;

use API\Bairros;
use API\Repositories\Contracts\BairrosRepositoryInterface;
use Illuminate\Http\Request;


class BairrosController extends Controller
{
    public function show(BairrosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(BairrosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(BairrosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(BairrosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(BairrosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
