<?php

namespace API\Repositories;

use API\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

final class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function show($id)
    {
        $user = $this->user->find($id);

        if (count($user) > 0) {
            return response()->json(['status' => 'success', 'data' => ['user' => $user]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $users = $this->user->all();

        if (count($users) > 0) {
            return response()->json(['status' => 'success', 'data' => ['user' => $users]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['senha'] = Hash::make($data['senha']);

        $validator = Validator::make($data, [
            'nome' => 'required',
            'email' => 'required|unique:user',
            'senha' => 'required',
            'cpf' => 'required|cpf|unique:user',
            'logradouro' => 'sometimes|required',
            'complemento' => 'sometimes|required',
            'bairro' => 'sometimes|required',
            'numero' => 'sometimes|required',
            'cidade' => 'sometimes|required',
            'cep' => 'sometimes|required',
            'uf' => 'sometimes|required',
            'telefone1' => 'sometimes|required',
            'telefone2' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'nome' => 'required',
                    'email' => 'required|unique:user',
                    'senha' => 'required',
                    'cpf' => 'required',
                    'logradouro' => 'sometimes|required',
                    'complemento' => 'sometimes|required',
                    'bairro' => 'sometimes|required',
                    'numero' => 'sometimes|required',
                    'cidade' => 'sometimes|required',
                    'cep' => 'sometimes|required',
                    'uf' => 'sometimes|required',
                    'telefone1' => 'sometimes|required',
                    'telefone2' => 'sometimes|required',
                ]], 400);
        }

        $create = $this->user->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $user = $this->user->find($id);

        if (count($user) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'nome' => 'sometimes|required',
                'email' => [
                    'sometimes',
                    'required',
                    Rule::unique('user')->ignore($id, 'id_user'),
                ],
                'senha' => 'sometimes|required',
                'cpf' => 'sometimes|required|cpf',
                'logradouro' => 'sometimes|required',
                'complemento' => 'sometimes|required',
                'bairro' => 'sometimes|required',
                'numero' => 'sometimes|required',
                'cidade' => 'sometimes|required',
                'cep' => 'sometimes|required',
                'uf' => 'sometimes|required',
                'telefone1' => 'sometimes|required',
                'telefone2' => 'sometimes|required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'nome' => 'required',
                        'email' => 'required|unique:user',
                        'senha' => 'required',
                        'cpf' => 'required',
                        'logradouro' => 'sometimes|required',
                        'complemento' => 'sometimes|required',
                        'bairro' => 'sometimes|required',
                        'numero' => 'sometimes|required',
                        'cidade' => 'sometimes|required',
                        'cep' => 'sometimes|required',
                        'uf' => 'sometimes|required',
                        'telefone1' => 'sometimes|required',
                        'telefone2' => 'sometimes|required',
                    ]], 400);
            }

            if (isset($data['senha'])) {
                $data['senha'] = Hash::make($data['senha']);
            }

            $user->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $user = $this->user->find($id);

        if (count($user) > 0) {
            $user->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}