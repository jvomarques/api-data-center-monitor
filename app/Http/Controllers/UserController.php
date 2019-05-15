<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(UserRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }

    public function showUserIdByEmail(UserRepositoryInterface $repository, $email)
    {
        return $repository->showUserIdByEmail($email);
    }

    public function showUserCPFByEmail(UserRepositoryInterface $repository, $email)
    {
        return $repository->showUserCPFByEmail($email);
    }
    public function showAll(UserRepositoryInterface $repository)
    {
        return $repository->showAll();
    }

    public function store(UserRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(UserRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function updatePassword(UserRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->updatePassword($request, $id);
    }

    public function delete(UserRepositoryInterface $repository, $id)
    {
        return $repository->delete($id);
    }
}
