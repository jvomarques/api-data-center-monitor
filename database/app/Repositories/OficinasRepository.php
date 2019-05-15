<?php

namespace API\Repositories;

use API\Repositories\Contracts\OficinasRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class OficinasRepository extends BaseRepository implements OficinasRepositoryInterface
{
    public function show($id)
    {
        $oficinas = $this->oficinas->find($id);

        if (count($oficinas) > 0) {
            return response()->json(['status' => 'success', 'data' => ['oficinas' => $oficinas]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $oficinas = $this->oficinas->all();

        if (count($oficinas) > 0) {
            return response()->json(['status' => 'success', 'data' => ['oficinas' => $oficinas]], 200);
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

        $create = $this->oficinas->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $oficinas = $this->oficinas->find($id);

        if (count($oficinas) > 0) {

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

            $oficinas->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $oficinas = $this->oficinas->find($id);

        if (count($oficinas) > 0) {
            $oficinas->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}