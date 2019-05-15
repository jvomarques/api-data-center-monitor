<?php

namespace API\Repositories;

use API\Repositories\Contracts\MontadorasRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class MontadorasRepository extends BaseRepository implements MontadorasRepositoryInterface
{
    public function show($id)
    {
        $montadoras = $this->montadoras->find($id);

        if (count($montadoras) > 0) {
            return response()->json(['status' => 'success', 'data' => ['montadoras' => $montadoras]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $montadoras = $this->montadoras->all();

        if (count($montadoras) > 0) {
            return response()->json(['status' => 'success', 'data' => ['montadoras' => $montadoras]], 200);
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

        $create = $this->montadoras->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $montadoras = $this->montadoras->find($id);

        if (count($montadoras) > 0) {

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

            $montadoras->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $montadoras = $this->montadoras->find($id);

        if (count($montadoras) > 0) {
            $montadoras->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}