<?php

namespace API\Repositories\Contracts;

interface MontadorasRepositoryInterface
{
    public function show($id);

    public function showAll();

    public function store($request);

    public function update($request, $id);

    public function delete($id);

}