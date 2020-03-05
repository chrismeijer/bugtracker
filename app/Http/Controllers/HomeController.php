<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
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
        $loggedInUser = Auth::user();
        // GET N BUGS PER PAGE
            $bugs = Bug::orderBy('created_at','desc')->paginate(30);
        // SET PERMISSION CONTROLLER
            $permission = new PermissionController();
            // CHECK FOR EDIT
                $requestEditBug = new Request(['name' => 'bugs.edit']);
                $userMayEditBug = (int)$permission->checkPermission($requestEditBug);
            // CHECK FOR DELETE
                $requestDeleteBug = new Request(['name' => 'bugs.destroy']);
                $userMayDeleteBug = (int)$permission->checkPermission($requestDeleteBug);
        // RETURN VIEW 
            return view('home', compact(['bugs', 'loggedInUser', 'userMayEditBug', 'userMayDeleteBug']));
    }
}
