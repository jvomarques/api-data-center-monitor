<?php

namespace API\Repositories;

use API\Repositories\Contracts\BairrosRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class BairrosRepository extends BaseRepository implements BairrosRepositoryInterface
{
    public function show($id)
    {
        $bairros = $this->bairros->find($id);

        if (count($bairros) > 0) {
            return response()->json(['status' => 'success', 'data' => ['bairros' => $bairros]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $bairros = $this->bairros->all();

        if (count($bairros) > 0) {
            return response()->json(['status' => 'success', 'data' => ['bairros' => $bairros]], 200);
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

        $create = $this->bairros->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $bairros = $this->bairros->find($id);

        if (count($bairros) > 0) {

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

            $bairros->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $bairros = $this->bairros->find($id);

        if (count($bairros) > 0) {
            $bairros->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}