<?php

namespace API\Repositories\Contracts;

interface VeiculosRepositoryInterface
{
	public function showUserId($user_id);

    public function show($id);

    public function showAll();

    public function store($request);

    public function update($request, $id);

    public function delete($id);

}