<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function getAll(Request $request){

        $token = substr($request->header('Authorization', 'Token <token>'),6);

        $programas = Program::all()->toArray();
        if(!$programas){
            return response()->json([
                'message' => 'no hay programas registrados'
            ]);
        }
        return response()->json([
            "code" => 200,
            "status" => 'true',
            "data" => $programas,
            "token" => $token
        ]);
       }

        public function store(Request $request)
        {
            Program::Create([
                'name' => $request->name,
                'credits' => $request->credits,
                'teacher' => $request->teacher,
                'asig_pre' => $request->asig_pre,
                'aut_hours' => $request->aut_hours,
                'dir_hours' => $request->dir_hours,
                'semester_id' => $request->semester_id
            ]);
           return response()->json([
            'message' => 'Materia creada con exito',
            'code' => 200,
            'status' => 'true',
            'data' => ''
           ]);
        }

        public function edit($id){
            if(!Program::find($id)){
                return response()->json([
                    'message' => 'no hay programas con ese id',
                    'status'=> 404
                ]);
            }
            $programa = Program::find($id);
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'true',
                    'data' => $programa
                ]);
        }

        public function update(Request $request, $id)
        {
            $programa = Program::all()->toArray();
            if($programa == null){
                return response()->json([
                     'message' => 'no hay programas'
                ]);
            }

            Program::find($id)->update($request->all());
            return response()->json([
                'message' => 'Update success',
                'data'=> $programa
            ]);
        }


        public function destroy($id)
        {
            if(!Program::find($id)){
                return response()->json([
                     'message' => 'categoria no encontrada'
                ]);
            }
            $programa = Program::find($id);
            $programa->delete();
            $programas = Program::all()->toArray();
            Program::destroy($id);
            return response()->json(
                [
                    'code' => 200,
                    'status' => 'true',
                    'data' => $programas
                ]
            );

        }
}
