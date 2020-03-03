<?php

namespace App\Http\Controllers;

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
        $roleId = auth()->user()->role_id;
        $routeName = isset($request->name) ? $request->name : $request->route()->getName();
        $routeSplit = explode('.',$routeName);
        $controller = $routeSplit[0];
        $action = $routeSplit[1];

        $allowed = DB::table('permissions')
            ->join('actions', 'permissions.action_id', '=', 'actions.id')
            ->where('permissions.role_id', $roleId)
            ->where('actions.controller', $controller)
            ->where('actions.action', $action)
            ->count();
            
        return boolval($allowed);
    }
}
