<?php

namespace API\Repositories;

use API\Repositories\Contracts\OficinasMontadorasRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class OficinasMontadorasRepository extends BaseRepository implements OficinasMontadorasRepositoryInterface
{
    public function show($id)
    {
        $oficinasmontadoras = $this->oficinasmontadoras->find($id);

        if (count($oficinasmontadoras) > 0) {
            return response()->json(['status' => 'success', 'data' => ['oficinasmontadoras' => $oficinasmontadoras]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $oficinasmontadoras = $this->oficinasmontadoras->all();

        if (count($oficinasmontadoras) > 0) {
            return response()->json(['status' => 'success', 'data' => ['oficinasmontadoras' => $oficinasmontadoras]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();

        $create = $this->oficinasmontadoras->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $oficinasmontadoras = $this->oficinasmontadoras->find($id);

        if (count($oficinasmontadoras) > 0) {

            $data = $request->all();

            $oficinasmontadoras->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $oficinasmontadoras = $this->oficinasmontadoras->find($id);

        if (count($oficinasmontadoras) > 0) {
            $oficinasmontadoras->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}