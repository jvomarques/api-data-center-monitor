<?php

namespace API\Repositories;

use API\Repositories\Contracts\CidadesRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class CidadesRepository extends BaseRepository implements CidadesRepositoryInterface
{
    public function show($id)
    {
        $cidades = $this->cidades->find($id);

        if (count($cidades) > 0) {
            return response()->json(['status' => 'success', 'data' => ['cidades' => $cidades]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $cidades = $this->cidades->all();

        if (count($cidades) > 0) {
            return response()->json(['status' => 'success', 'data' => ['cidades' => $cidades]], 200);
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

        $create = $this->cidades->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $cidades = $this->cidades->find($id);

        if (count($cidades) > 0) {

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

            $cidades->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $cidades = $this->cidades->find($id);

        if (count($cidades) > 0) {
            $cidades->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}