<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function authJwt(AuthenticateRepositoryInterface $repository, Request $request)
    {
        return $repository->authJwt($request);
    }

    public function redirectToProvider(AuthenticateRepositoryInterface $repository)
    {
    	return $repository->redirectToProvider();
    }

    public function handleProviderCallback(AuthenticateRepositoryInterface $repository)
    {
    	return $repository->handleProviderCallback();
    }
}
