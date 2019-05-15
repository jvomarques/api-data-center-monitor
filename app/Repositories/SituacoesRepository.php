<?php

namespace API\Repositories;

use API\Repositories\Contracts\SituacoesRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class SituacoesRepository extends BaseRepository implements SituacoesRepositoryInterface
{
    public function show($id)
    {
        $situacoes = $this->situacoes->find($id);

        if (count($situacoes) > 0) {
            return response()->json(['status' => 'success', 'data' => ['situacoes' => $situacoes]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $situacoes = $this->situacoes->all();

        if (count($situacoes) > 0) {
            return response()->json(['status' => 'success', 'data' => ['situacoes' => $situacoes]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'nome' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'nome' => 'required',
                ]], 400);
        }

        $create = $this->situacoes->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $situacoes = $this->situacoes->find($id);

        if (count($situacoes) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'nome' => 'sometimes|required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'nome' => 'required',
                        ]], 400);
            }

            $situacoes->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $situacoes = $this->situacoes->find($id);

        if (count($situacoes) > 0) {
            $situacoes->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}