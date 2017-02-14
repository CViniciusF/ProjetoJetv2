<?php

namespace ProjetoJetv2\Http\Middleware;

use Closure;

class Autorizador
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
        if (!$request->is('logar') && \Auth::guest()) {
            return redirect('/logar');
        }
        return $next($request);
    }
}
