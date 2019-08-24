<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


use App\User;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::where('status', 1)->get();
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
    public function store(UserRequest $request)
    {
        $userData = $request->all();
        // bcrypt('password') -> Hash(salt + md5) Ex: '$2y$10$tVCkTDpWgxLyGesYXZsLr.6tKSCb3qds3VE.bLP3BPcLvSm9qbY/S'
        $userData['password'] = bcrypt($userData['password']);
        return User::create($userData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
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
        $user = User::findOrFail($id);

        // TODO:
        $userUpdated = $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO:
        // $userDeleted = Auth()->id Auth::user()->id
        $userDeleted = 3;

        $user = User::findOrFail($id);
        $user->update([
            'status' => 0,
            'deleted_at' => Carbon::now()->toDateTimeString(),
            'user_id' => $userDeleted,
        ]);
    }
}
