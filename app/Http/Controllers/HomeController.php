<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Bug;
use App\Http\Controllers\PermissionController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        //$roleId = auth()->user()->role_id;
        $permission = new PermissionController();
        // CHECK FOR EDITING BUG
            $requestEditBug = new Request(['name' => 'bugs.edit']);
            $userMayEditBug = (int)$permission->checkPermission($requestEditBug);
        // CHECK FOR DELETING BUG
            $requestDeleteBug = new Request(['name' => 'bugs.destroy']);
            $userMayDeleteBug = (int)$permission->checkPermission($requestDeleteBug);

        $bugs = Bug::orderBy('created_at','desc')->paginate(30);

        return view('home', compact(['bugs', 'user', 'userMayEditBug', 'userMayDeleteBug']));
    }
}
