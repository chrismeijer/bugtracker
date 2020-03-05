<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use App\Policies\UserPolicy;
use App\Rules\ValidatePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display N users per page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedInUser = Auth::user();
        // GET N USERS PER PAGE
            $users = User::with('role')->orderBy('name','asc')->paginate(30);
        // SET PERMISSION CONTROLLER
            $permission = new PermissionController();
                // CHECK FOR EDIT
                    $requestEditUser = new Request(['name' => 'users.edit']);
                    $userMayEditUser = (int)$permission->checkPermission($requestEditUser);
                // CHECK FOR DELETE
                    $requestDeleteUser = new Request(['name' => 'users.destroy']);
                    $userMayDeleteUser = (int)$permission->checkPermission($requestDeleteUser);
        // RETURN VIEW
            return view('users.index', compact(['loggedInUser', 'userMayEditUser', 'userMayDeleteUser', 'users']));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loggedInUser = Auth::user();
        if($loggedInUser->role_id == 1)
            $allRoles = Role::all();
        else 
            $allRoles = Role::get()->where('id', '!=', '1');

        $roles = array();
        foreach($allRoles as $role) :
            $roles[$role->id] = $role->title;
        endforeach;

        return view('users.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'same:password_confirm'
        ]);

        $user = new User();
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('users');
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

        $gateInspector = Gate::inspect('update', $requested_user);

        if($gateInspector->allowed()) :
            $loggedInUser = Auth::user();
            if($loggedInUser->role_id == 1)
                $allRoles = Role::all();
            else 
                $allRoles = Role::get()->where('id', '!=', '1');

            $roles = array();
            foreach($allRoles as $role) :
                $roles[$role->id] = $role->title;
            endforeach;
            return view('users.edit', compact(['requested_user', 'roles']));
        else :
            return view('errors.not-authorized');
        endif;
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'same:password_confirm'
        ]);

        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        if(!empty($request->password))
            $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestedUser = User::findOrFail($id);

        $gateInspector = Gate::inspect('delete', $requestedUser);

        if($gateInspector->allowed()) :
            $requestedUser->delete();
            return redirect('users');
        else :
            return view('errors.not-authorized');
        endif;
    }
}
