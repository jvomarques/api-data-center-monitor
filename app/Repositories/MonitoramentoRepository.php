<?php

namespace API\Repositories;

use API\Repositories\Contracts\MonitoramentoRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class MonitoramentoRepository extends BaseRepository implements MonitoramentoRepositoryInterface
{
    public function show($id)
    {
        $monitoramento = $this->monitoramento->find($id);

        if (count($monitoramento) > 0) {
            return response()->json(['status' => 'success', 'data' => ['monitoramento' => $monitoramento]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $monitoramento = $this->monitoramento->all();

        if (count($monitoramento) > 0) {
            return response()->json(['status' => 'success', 'data' => ['monitoramento' => $monitoramento]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        // $validator = Validator::make($data, [
        //     'nome' => 'required',
        // ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'nome' => 'required',
                ]], 400);
        }

        $create = $this->monitoramento->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $monitoramento = $this->monitoramento->find($id);

        if (count($monitoramento) > 0) {

            $data = $request->all();

            // $validator = Validator::make($data, [
            //     'nome' => 'sometimes|required',

            // ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'nome' => 'required',
                        ]], 400);
            }

            $monitoramento->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $monitoramento = $this->monitoramento->find($id);

        if (count($monitoramento) > 0) {
            $monitoramento->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}