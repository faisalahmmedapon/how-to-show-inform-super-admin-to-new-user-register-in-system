<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function notification()
    {
        return view('notification');
    }
    public function index()
    {
        $users = User::where('status','unread')->get();

        $un_read_user_count = count($users);
        return response()->json([
            'message' => 'success',
            'users' => $users,
            'un_read_user_count' => $un_read_user_count,
        ]);
    }
    public function users()
    {
        $users = User::all();

        return response()->json([
            'message' => 'success',
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
