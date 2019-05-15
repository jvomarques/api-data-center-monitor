<?php

namespace API\Repositories\Contracts;

interface ComissoesRepositoryInterface
{
    public function show($id);

    public function showAll();

    public function store($request);

    public function update($request, $id);

    public function delete($id);

}