<?php

namespace API\Repositories;

use API\Repositories\Contracts\VeiculosRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class VeiculosRepository extends BaseRepository implements VeiculosRepositoryInterface
{
    
    public function showUserId($user_id)
    {
        $veiculos = $this->veiculos
        ->select('veiculos.id as id',
                 'modelos.id as modelos_id',
                 'veiculos.cores_id', 'veiculos.ano', 'veiculos.km', 'veiculos.placa',
                 'modelos.nome_modelo', 'cores.nome_cor'
                 )
        ->join('modelos', 'veiculos.modelos_id', '=', 'modelos.id')
        ->join('cores', 'veiculos.cores_id', '=', 'cores.id')
        ->where('user_id','=', $user_id)
        ->get();

        if (count($veiculos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['veiculos' => $veiculos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }


    public function show($id)
    {
        $veiculos = $this->veiculos->find($id);

        if (count($veiculos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['veiculos' => $veiculos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $veiculos = $this->veiculos->all();

        if (count($veiculos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['veiculos' => $veiculos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'user_id' => 'required',
            'modelos_id' => 'required',
            'cores_id' => 'required',   
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'user_id' => 'required',
                    'modelos_id' => 'required',
                    'cores_id' => 'required',

                ]], 400);
        }
        
        $create = $this->veiculos->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $veiculos = $this->veiculos->find($id);

        if (count($veiculos) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'user_id' => 'sometimes|required',
                'modelos_id' => 'sometimes|required',
                'cores_id' => 'sometimes|required',
                'ano' => 'sometimes|required',
                'km' => 'sometimes|required',
                'placa' => 'sometimes|required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'user_id' => 'sometimes|required',
                        'modelos_id' => 'sometimes|required',
                        'cores_id' => 'sometimes|required',
                        'ano' => 'sometimes|required',
                        'km' => 'sometimes|required',
                        'placa' => 'sometimes|required',
                        ]], 400);
            }

            $veiculos->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $veiculos = $this->veiculos->find($id);

        if (count($veiculos) > 0) {
            $veiculos->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}