<?php

namespace API\Repositories;

use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class AuthenticateRepository extends BaseRepository implements AuthenticateRepositoryInterface
{
    public function authJWT($request)
    {
        $data = $request->only('email', 'senha');

        $user = $this->user->where('email', $data['email'])->first();

        if (count($user) > 0 && Hash::check($data['senha'], $user->senha)) {
            $token = $this->JWTAuth->fromUser($user);

            $userId = $user->id_user;
            
            return response()->json(['status' => 'success', 'data' => [
                'token' => $token,
                'user_id' => "$userId"    
                ]], 200);
        }

        return response()->json(['status' => 'fail', 'data' => ['email' => 'Verifique o email novamente', 'password' => 'Verifique a senha novamente']], 401);
    }

}