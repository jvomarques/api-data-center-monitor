<?php

namespace API\Repositories;

use API\Repositories\Contracts\MarcasRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class MarcasRepository extends BaseRepository implements MarcasRepositoryInterface
{
    public function show($id)
    {
        $marcas = $this->marcas->find($id);

        if (count($marcas) > 0) {
            return response()->json(['status' => 'success', 'data' => ['marcas' => $marcas]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $marcas = $this->marcas->all();

        if (count($marcas) > 0) {
            return response()->json(['status' => 'success', 'data' => ['marcas' => $marcas]], 200);
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

        $create = $this->marcas->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $marcas = $this->marcas->find($id);

        if (count($marcas) > 0) {

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

            $marcas->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $marcas = $this->marcas->find($id);

        if (count($marcas) > 0) {
            $marcas->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}