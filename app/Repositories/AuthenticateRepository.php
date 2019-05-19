<?php

namespace API\Repositories;

use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Socialite;
use API\User;

final class AuthenticateRepository extends BaseRepository implements AuthenticateRepositoryInterface
{
    public function authJWT($request)
    {
        $data = $request->only('email', 'senha');

        $user = $this->user->where('email', $data['email'])->first();

        // dd($user);

        if (count($user) > 0 && Hash::check($data['senha'], $user->senha)) {
            $token = $this->JWTAuth->fromUser($user);

            // $userId = $user->id_user;
            
            return response()->json(['status' => 'success', 'data' => [
                'token' => $token  
                ]], 200);
        }

        return response()->json(['status' => 'fail', 'data' => ['email' => 'Verifique o email novamente', 'password' => 'Verifique a senha novamente']], 401);
    }

    public function redirectToProvider()
    {
         
        return Socialite::driver('facebook')->redirect(); 

    }

    public function handleProviderCallback()
    {

        $user = Socialite::driver('facebook')->stateless()->user();
        
        $findUser = User::where('email',$user->email)->first();

        if($findUser)
        {

            $data = ['email' => $user->email, 'senha' => $user->id];
            $user = $this->user->where('email', $data['email'])->first();

            if (count($user) > 0 && Hash::check($data['senha'], $user->senha)) {
                $token = $this->JWTAuth->fromUser($user);

                $userId = $user->id_user;
                
                return response()->json(['status' => 'success', 'data' => [
                    'token' => $token 
                    ]], 200);
            }

            return response()->json(['status' => 'fail', 'data' => ['email' => 'Verifique o email novamente', 'password' => 'Verifique a senha novamente']], 401);    

        }else{

            $userDB = new User;
            $userDB->nome  = $user->name;
            $userDB->email = $user->email;
            $userDB->senha = bcrypt($user->id);
            $userDB->save();

            $data = ['email' => $user->email, 'senha' => $user->id];
            $user = $this->user->where('email', $data['email'])->first();

            if (count($user) > 0 && Hash::check($data['senha'], $user->senha)) {
                $token = $this->JWTAuth->fromUser($user);

                $userId = $user->id_user;
                
                return response()->json(['status' => 'success', 'data' => [
                    'token' => $token  
                    ]], 200);
            }

            return response()->json(['status' => 'fail', 'data' => ['email' => 'Verifique o email novamente', 'password' => 'Verifique a senha novamente']], 401); 
            /*
            if (count($user) > 0) {
            return response()->json(['status' => 'success', 'data' => [

                'token' => $user->token,
                'nome' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'avatar' => $user->avatar,
                ]], 200);
            }
            */
        }
    }
}