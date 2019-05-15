<?php

namespace API\Repositories;

use API\Repositories\Contracts\UserOnesignalRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

final class UserOnesignalRepository extends BaseRepository implements UserOnesignalRepositoryInterface
{
    
    public function show($user_id){

        $userOnesignal = $this->userOnesignal
        ->select('user_id', 'onesignal_id')
        ->where('user_id','=', $user_id)
        ->get();

        if (count($userOnesignal) > 0) {
            return response()->json(['status' => 'success', 'data' => ['userOnesignal' => $userOnesignal]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function showAll()
    {
        $userOnesignal = $this->userOnesignal->all();

        if (count($userOnesignal) > 0) {
            return response()->json(['status' => 'success', 'data' => ['userOnesignal' => $userOnesignal]], 200);
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
                'user_id' => 'required',
                ], 400);
        }

        $create = $this->userOnesignal->create($data);

        if (count($create) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $user_id)
    {
        $userOnesignal = $this->userOnesignal->where('user_id', $user_id)->get()->first();

        //dd($userOnesignal);

        if (count($userOnesignal) > 0) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'user_id' => 'required',
                    ], 400);
            }

            $userOnesignal->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($id)
    {
        $userOnesignal = $this->userOnesignal->find($id);

        if (count($userOnesignal) > 0) {
            $userOnesignal->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}