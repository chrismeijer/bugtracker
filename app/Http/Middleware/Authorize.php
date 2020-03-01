<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\PermissionController;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permission = new PermissionController();
        $allowed = $permission->checkPermission($request);
        if(!$allowed) :
            return redirect()->route('redirect-to-error-not-authorized');
        endif;
        return $next($request);
    }
}
