<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Check permission of the role by requested route name.
     * @return boolean allowed
    */
    public function checkPermission($request)
    {
        $loggedInUser = Auth::user();
        if(!$loggedInUser) 
            return false;
        $roleId = $loggedInUser->role_id;
        $routeName = isset($request->name) ? $request->name : $request->route()->getName();
        $routeSplit = explode('.',$routeName);
        $controller = $routeSplit[0];
        $action = $routeSplit[1];

        switch($action) :
            case 'store':
                $action = 'create';
            break;

            case 'update':
                $action = 'edit';
            break;
        endswitch;

        $allowed = DB::table('permissions')
            ->join('actions', 'permissions.action_id', '=', 'actions.id')
            ->where('permissions.role_id', $roleId)
            ->where('actions.controller', $controller)
            ->where('actions.action', $action)
            ->count();
            
        return boolval($allowed);
    }
}
