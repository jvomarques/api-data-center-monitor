<?php

namespace API\Repositories;

use API\Repositories\Contracts\AtendimentosServicosRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class AtendimentosServicosRepository extends BaseRepository implements AtendimentosServicosRepositoryInterface
{
    public function show($id)
    {
        $atendimentosServicos = $this->atendimentosServicos->find($id);

        if (count($atendimentosServicos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentosServicos' => $atendimentosServicos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $atendimentosServicos = $this->atendimentosServicos->all();

        if (count($atendimentosServicos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentosServicos' => $atendimentosServicos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $create = $this->atendimentosServicos->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $atendimentosServicos = $this->atendimentosServicos->find($id);

        if (count($atendimentosServicos) > 0) {

            $data = $request->all();

            $atendimentosServicos->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $atendimentosServicos = $this->atendimentosServicos->find($id);

        if (count($atendimentosServicos) > 0) {
            $atendimentosServicos->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}