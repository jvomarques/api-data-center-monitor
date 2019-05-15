<?php

namespace API\Repositories;

use API\Repositories\Contracts\ModelosRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class ModelosRepository extends BaseRepository implements ModelosRepositoryInterface
{
    public function show($id)
    {
        $modelos = $this->modelos->find($id);

        if (count($modelos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['modelos' => $modelos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $modelos = $this->modelos->all();

        if (count($modelos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['modelos' => $modelos]], 200);
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

        $create = $this->modelos->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $modelos = $this->modelos->find($id);

        if (count($modelos) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'marcas_id' => 'sometimes|required',
                'nome' => 'sometimes|required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'marcas_id' => 'required',
                        'nome' => 'required',
                        ]], 400);
            }

            $modelos->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $modelos = $this->modelos->find($id);

        if (count($modelos) > 0) {
            $modelos->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}