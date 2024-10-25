<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Create POST 
    public function strore(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    //Read GET
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    // Read (GET) by ID
    public function show($id)
    {
        $user = User::find($id);
        if($user) {
            return response()->json($user);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    //Update (PUT/patch)
    public function update(Request $request,$id)
    {
        $user= User::find($id);
        if($user) {
            $user->update($request->all());
            return response()->json($user);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    //Delete DELETE
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted']);
        }
        return response()->json(['message' => 'User not found'], 404);
    }
}
