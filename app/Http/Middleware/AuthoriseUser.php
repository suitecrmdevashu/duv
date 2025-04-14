<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthoriseUser
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
        
        $currentPath= Route::getCurrentRoute()->getActionName();
        $routeName = explode('@', $currentPath);

        // $forbidden_abilities = Auth::user()->getForbiddenAbilities()->toArray();
        // $forbidden_abilities = array_column($forbidden_abilities, 'name');
        
        $abilities = Auth::user()->toArray();
       
       $abilities = DB::select("select name from abilities where id in (select ability_id from permissions where entity_id=".$abilities['role_id'].")");
    //    $abilities= Ability::select('id', 'title', 'name')->where()->get();
    //     print_r($abilities);
    //     exit;
        $abilities = array_column($abilities, 'name');
       // print_r($abilities);
        // dd($routeName[1], $abilities);
        // if (!$request->ajax() && ! Gate::allows($routeName[1])) {
        // if (Gate::denies($routeName[1])) {
            // return redirect()->route('unauthorised_access');
        
        if(! $request->ajax() && ! in_array($routeName[1], $abilities)){
            abort(403, 'Access Denied');
        }
        return $next($request);
    }
}