<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function getAll(Request $request){

        $token = substr($request->header('Authorization', 'Token <token>'),6);

        $users = User::all()->toArray();
        if(!$users){
            return response()->json([
                'message' => 'no hay programas registrados'
            ]);
        }
        return response()->json([
            "code" => 200,
            "status" => 'true',
            "data" => $users,
            "token" => $token
        ]);
       }

        public function store(Request $request)
        {
            $user = User::Create([
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password)

            ]);
            $token = JWTAuth::fromUser($user);
           return response()->json([
            'message' => 'Usuario creado con exito',
            'code' => 200,
            'status' => 'true',
            'token' => $token,
            'data' => $user
           ]);
        }

        public function edit($id){
            if(!User::find($id)){
                return response()->json([
                    'message' => 'no hay usuarios con ese id',
                    'status'=> 404
                ]);
            }
            $user = User::find($id);
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'true',
                    'data' => $user
                ]);
        }

        public function update(Request $request, $id)
        {
            $user = Program::all()->toArray();
            if($user == null){
                return response()->json([
                     'message' => 'no hay usuarios'
                ]);
            }

            Program::find($id)->update($request->all());
            return response()->json([
                'message' => 'Update success',
                'data'=> $user
            ]);
        }


        public function destroy($id)
        {
            if(!User::find($id)){
                return response()->json([
                     'message' => 'Ususario no encontrada'
                ]);
            }
            $user = User::find($id);
            $user->delete();
            $users = User::all()->toArray();
            User::destroy($id);
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'true',
                    'data' => $users
                ]
            );

        }
}
