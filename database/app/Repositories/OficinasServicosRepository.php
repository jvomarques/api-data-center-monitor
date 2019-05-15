<?php

namespace API\Repositories;

use API\Repositories\Contracts\OficinasServicosRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class OficinasServicosRepository extends BaseRepository implements OficinasServicosRepositoryInterface
{
    public function show($id)
    {
        $oficinasservicos = $this->oficinasservicos->find($id);

        if (count($oficinasservicos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['oficinasservicos' => $oficinasservicos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $oficinasservicos = $this->oficinasservicos->all();

        if (count($oficinasservicos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['oficinasservicos' => $oficinasservicos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();

        $create = $this->oficinasservicos->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $oficinasservicos = $this->oficinasservicos->find($id);

        if (count($oficinasservicos) > 0) {

            $data = $request->all();

            $oficinasservicos->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $oficinasservicos = $this->oficinasservicos->find($id);

        if (count($oficinasservicos) > 0) {
            $oficinasservicos->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}