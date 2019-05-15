<?php

namespace API\Http\Controllers;

use API\Veiculos;
use API\Repositories\Contracts\VeiculosRepositoryInterface;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    
    public function showUserId(VeiculosRepositoryInterface $repository, $user_id)
    {
        return $repository->showUserId($user_id);
    }

    public function show(VeiculosRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(VeiculosRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(VeiculosRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(VeiculosRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(VeiculosRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
