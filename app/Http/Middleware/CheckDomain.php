<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Dominio;

class CheckDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //$dominioName = $request->getHost();
        $dominioName = $request->header('X-DOMAIN-NAME');


        $dominio = Dominio::where('nombre_dominio', $dominioName)->first();


        $dataActual = now();



        if (!$dominio) {
            return response()->json(['message' => 'Domain no encontrado'], 404);
        }

        if (!$dominio->actiu) {
            return response()->json(['message' => 'Domain no activo'], 403);
        }

        $dataActual = now();
        //        if ($dominio->data_alta < $dataActual && $dominio->data_baja > $dataActual) {
        if (!($dominio->data_alta <= $dataActual && $dataActual <= $dominio->data_baja)) {

            return response()->json(['message' => 'Domain factura vencida'], 403);
        }
        return $next($request);
    }
}
