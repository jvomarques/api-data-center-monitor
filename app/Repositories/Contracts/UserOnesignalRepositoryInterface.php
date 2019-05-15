<?php

namespace API\Repositories\Contracts;

interface UserOnesignalRepositoryInterface
{
	
    public function show($user_id);

    public function showAll();

    public function store($request);

    public function update($request, $user_id);

    public function delete($user_id);

}