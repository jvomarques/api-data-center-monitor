<?php

namespace API\Repositories;

use API\Repositories\Contracts\AtendimentosOficinasRepositoryInterface;

final class AtendimentosOficinasRepository extends BaseRepository implements AtendimentosOficinasRepositoryInterface
{
    public function show($id)
    {
        $atendimentosoficinas = $this->atendimentosoficinas->find($id);

        if (count($atendimentosoficinas) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentosoficinas' => $atendimentosoficinas]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $atendimentosoficinas = $this->atendimentosoficinas->all();

        if (count($atendimentosoficinas) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentosoficinas' => $atendimentosoficinas]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();

        $create = $this->atendimentosoficinas->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $atendimentosoficinas = $this->atendimentosoficinas->find($id);

        if (count($atendimentosoficinas) > 0) {

            $data = $request->all();

            $atendimentosoficinas->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $atendimentosoficinas = $this->atendimentosoficinas->find($id);

        if (count($atendimentosoficinas) > 0) {
            $atendimentosoficinas->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}