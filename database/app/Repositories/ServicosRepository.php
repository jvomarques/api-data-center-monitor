<?php

namespace API\Repositories;

use API\Repositories\Contracts\ServicosRepositoryInterface;

final class ServicosRepository extends BaseRepository implements ServicosRepositoryInterface
{
    public function show($id)
    {
        $servicos = $this->servicos->find($id);

        if (count($servicos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['servicos' => $servicos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $servicos = $this->servicos->all();

        if (count($servicos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['servicos' => $servicos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'placa' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'placa' => 'required',
                ]], 400);
        }

        $create = $this->servicos->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $servicos = $this->servicos->find($id);

        if (count($servicos) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'placa' => 'sometimes|required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'placa' => 'required',
                        ]], 400);
            }

            $servicos->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $servicos = $this->servicos->find($id);

        if (count($servicos) > 0) {
            $servicos->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}