<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\UserOnesignalRepositoryInterface;
use Illuminate\Http\Request;

class UserOnesignalController extends Controller
{   
    public function show(UserOnesignalRepositoryInterface $repository, $user_id)
    {
        return $repository->show($user_id);
    }

    public function showAll(UserOnesignalRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(UserOnesignalRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(UserOnesignalRepositoryInterface $repository, Request $request, $user_id)
    {
        return $repository->update($request, $user_id);
    }

    public function delete(UserOnesignalRepositoryInterface $repository, $user_id)
    {
        return $repository->delete($user_id);
    }
}
