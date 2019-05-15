<?php

namespace API\Repositories;

use API\Repositories\Contracts\AtendimentosRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class AtendimentosRepository extends BaseRepository implements AtendimentosRepositoryInterface
{   
    public function showUserId($user_id)
    {
        $atendimentos = $this->atendimentos
        ->select('atendimentos.id','atendimentos.user_id as atendimento_user_id','atendimentos.dataabertura', 'atendimentos.veiculos_id', 'atendimentos.oficinas_id', 'atendimentos.dataagendamento', 'atendimentos.tempoprevisto', 'atendimentos.datafechamento', 'atendimentos.valor', 'atendimentos.avaliacoes_id', 'atendimentos.logradouro', 'atendimentos.complemento', 'atendimentos.bairro', 'atendimentos.numero', 'atendimentos.cidade', 'atendimentos.cep', 'atendimentos.uf', 'atendimentos.situacoes_id', 'atendimentos.observacoes','modelos.nome_modelo as modelo_nome', 'veiculos.placa as veiculo_placa','situacoes.nome as situacao_nome', 'veiculos.user_id as veiculos_user_id')
        ->join('veiculos','veiculos.id', '=', 'atendimentos.veiculos_id')
        ->join('modelos','modelos.id', '=', 'veiculos.modelos_id')
        ->join('situacoes','situacoes.id', '=', 'atendimentos.situacoes_id')
        ->where('atendimentos.user_id','=', $user_id)
        ->get();

        if (count($atendimentos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentos' => $atendimentos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function show($id)
    {
        $atendimentos = $this->atendimentos->find($id);

        if (count($atendimentos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentos' => $atendimentos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $atendimentos = $this->atendimentos->all();

        if (count($atendimentos) > 0) {
            return response()->json(['status' => 'success', 'data' => ['atendimentos' => $atendimentos]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'user_id' => 'required',
                ]], 400);
        }

        $create = $this->atendimentos->create($data);
        $idReturn = $create->id;

        if (count($create) > 0) {
            return response()->json(['status' => 'success', 'data' => [
                'id' => "$idReturn"
                ]], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $atendimentos = $this->atendimentos->find($id);

        if (count($atendimentos) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'user_id' => 'sometimes|required',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'user_id' => 'required',
                        ]], 400);
            }

            $atendimentos->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $atendimentos = $this->atendimentos->find($id);

        if (count($atendimentos) > 0) {
            $atendimentos->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}