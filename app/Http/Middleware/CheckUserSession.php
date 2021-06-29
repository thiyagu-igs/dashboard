<?php
namespace App\Http\Middleware;

use Closure;
class CheckUserSession
{
    public function handle($request, Closure $next)
    {	
        // Perform action
		if(!$request->session()->has('userid'))
		return redirect('login');
		
		 return $next($request);
    }
}
?>