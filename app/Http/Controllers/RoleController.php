<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function findRol(Request $request, $id)
    {
        $token = substr($request->header('Authorization', 'Token <token>'),6);
        try {

            $rol = Role::find($id);
            $rolName = $rol->name;
            return response()->json([
              'code' => 200,
              'status' => 'ok',
              'data' => $rolName
            ]);

        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return response()->json([
               'code' => 500,
               'status' => 'error',
               'data' => $error
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
