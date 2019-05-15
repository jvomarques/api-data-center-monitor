<?php

namespace API\Repositories;

use API\Repositories\Contracts\AvaliacoesRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class AvaliacoesRepository extends BaseRepository implements AvaliacoesRepositoryInterface
{
    public function show($id)
    {
        $avaliacoes = $this->avaliacoes->find($id);

        if (count($avaliacoes) > 0) {
            return response()->json(['status' => 'success', 'data' => ['avaliacoes' => $avaliacoes]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $avaliacoes = $this->avaliacoes->all();

        if (count($avaliacoes) > 0) {
            return response()->json(['status' => 'success', 'data' => ['avaliacoes' => $avaliacoes]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'valor' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'valor' => 'required',
                ]], 400);
        }

        $create = $this->avaliacoes->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $avaliacoes = $this->avaliacoes->find($id);

        if (count($avaliacoes) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'valor' => 'sometimes|required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'valor' => 'required',
                        ]], 400);
            }

            $avaliacoes->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $avaliacoes = $this->avaliacoes->find($id);

        if (count($avaliacoes) > 0) {
            $avaliacoes->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}