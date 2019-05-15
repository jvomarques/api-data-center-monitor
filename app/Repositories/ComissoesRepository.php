<?php

namespace API\Repositories;

use API\Repositories\Contracts\ComissoesRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class ComissoesRepository extends BaseRepository implements ComissoesRepositoryInterface
{
    public function show($id)
    {
        $comissoes = $this->comissoes->find($id);

        if (count($comissoes) > 0) {
            return response()->json(['status' => 'success', 'data' => ['comissoes' => $comissoes]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $comissoes = $this->comissoes->all();

        if (count($comissoes) > 0) {
            return response()->json(['status' => 'success', 'data' => ['comissoes' => $comissoes]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'comissao' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'comissao' => 'required',
                ]], 400);
        }

        $create = $this->comissoes->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $comissoes = $this->comissoes->find($id);

        if (count($comissoes) > 0) {

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

            $comissoes->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $comissoes = $this->comissoes->find($id);

        if (count($comissoes) > 0) {
            $comissoes->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}