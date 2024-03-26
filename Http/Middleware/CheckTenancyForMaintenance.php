<?php

namespace Modules\Isite\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;

class CheckTenancyForMaintenance extends CheckForMaintenanceMode
{
    public function handle($request, Closure $next)
    {
        if (! is_null(tenant()) && tenant('maintenance_mode')) {
            $data = tenant('maintenance_mode');

            $tpl = 'isite::frontend.errors.maintenance';
            $ttpl = 'errors.maintenance';

            if (view()->exists($ttpl)) $tpl = $ttpl;

            //OJO: esto en DEEV genera un error
            //return view($tpl);

            return response(trans("isite::organizations.messages.not available"), 500);

        }

        return $next($request);
    }
}
