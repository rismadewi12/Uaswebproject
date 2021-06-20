<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\TryCatch;

class EnsureUserRoleIsAllowedToAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try{

            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();

            if (in_array($currentRouteName, $this->userAccessRole()[$userRole])){
            return $next($request);

            }else{
                abort(403,'ANDA TIDAK MEMILIKI AKSES');
            }
        }catch(\Throwable $th){
            abort(403,'ANDA TIDAK MEMILIKI AKSES');

            
        }
    }
    private function userAccessRole(){
        return [
            'admin' => [
                'dashboard','mahasiswa','dosen','Point'
            ],

            'mahasiswa' => [
                'dashboard','Point'
            ],
        ];
    }
}
