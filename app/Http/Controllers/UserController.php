<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNextUsers(Request $request)
    {
        // return User::where('status', 1)->get();
        // return DB::select('select * from users where status = ?', [1]);

        // $lat = "-23.9772151";
        // $lng = "-46.3082780";

        $requestData = $request->all();

        $lat = $requestData['lat'];
        $lng = $requestData['lng'];

        if(!empty($requestData['km_distance'])) {
            $km_distance = $requestData['km_distance'];
        } else {
            $km_distance = 10;
        }


        return DB::select("
            SELECT
                (((ACOS(SIN(($lat *PI()/180)) * SIN((`lat`*PI()/180))+COS(($lat *PI()/180))  * COS((`lat`*PI()/180)) * COS((($lng - `lng`)*PI()/180))))*180/PI())*60*1.1515*1.609344) AS distance,
                name,
                lat,
                lng

            FROM users
            WHERE
                (((ACOS(SIN(($lat *PI()/180)) * SIN((`lat`*PI()/180))+COS(($lat *PI()/180))  * COS((`lat`*PI()/180)) * COS((($lng - `lng`)*PI()/180))))*180/PI())*60*1.1515*1.609344) <= $km_distance
                and status = :status
            ORDER BY distance
        ", [
            'status' => 1,
            // 'lat' => -23.9772151
        ]);

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
