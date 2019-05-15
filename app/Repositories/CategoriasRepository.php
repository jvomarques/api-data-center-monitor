<?php

namespace API\Repositories;

use API\Repositories\Contracts\CategoriasRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class CategoriasRepository extends BaseRepository implements CategoriasRepositoryInterface
{
    public function show($id)
    {
        $categorias = $this->categorias->find($id);

        if (count($categorias) > 0) {
            return response()->json(['status' => 'success', 'data' => ['categorias' => $categorias]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $categorias = $this->categorias->all();

        if (count($categorias) > 0) {
            return response()->json(['status' => 'success', 'data' => ['categorias' => $categorias]], 200);
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

        $create = $this->categorias->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $categorias = $this->categorias->find($id);

        if (count($categorias) > 0) {

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

            $categorias->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $categorias = $this->categorias->find($id);

        if (count($categorias) > 0) {
            $categorias->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}