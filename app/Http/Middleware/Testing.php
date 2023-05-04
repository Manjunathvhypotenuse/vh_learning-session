<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
class testing
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        $is_valid = $request->query("isvalid");
        if (in_array($is_valid, [null, "false"])){
            return response()->json([
            "message" => "Bad request"
        ],400);
        }
        Log::info("Middleware validation is success");
        return $next($request);
    }

    public function terminate (Request $request, Response $response): Response
    {
        $server_response = $response;
        Log::info("Middleware called after response");
        return $server_response;

    }
}
