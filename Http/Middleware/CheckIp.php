<?php

namespace Modules\Isite\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\IpUtils;

class CheckIp
{
    public function handle($request, Closure $next)
    {

        $ipsAllowed = config('asgard.icustom.config.ipsAllowed');

        //Only pass with this
        if (!is_null($ipsAllowed) && IpUtils::checkIp($request->ip(),$ipsAllowed)) 
            return $next($request);
       

        throw new \Exception("IP not allowed");

    }
}
