<?php

namespace API\Http\Controllers;

use API\Monitoramento;
use API\Repositories\Contracts\MonitoramentoRepositoryInterface;
use Illuminate\Http\Request;

class MonitoramentoController extends Controller
{
    public function show(MonitoramentoRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showAll(MonitoramentoRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(MonitoramentoRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(MonitoramentoRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(MonitoramentoRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
