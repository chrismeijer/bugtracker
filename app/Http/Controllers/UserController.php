<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $requested_user = User::findOrFail($id);
        return view('users.read', compact('requested_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requested_user = User::findOrFail($id);

        //echo '<pre>';
        
        //print_r($requested_user);

        //echo $requested_user->role;

        //print_r($requested_user->bugsAssigned);

        //exit;

        $response = Gate::inspect('update', $requested_user);

        if($response->allowed())
            return view('users.edit', compact('requested_user'));
        else
            return view('errors.not-authorized');
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
