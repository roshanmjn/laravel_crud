<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try{
            $access_token = $request->cookie('access_token');
            if(!$access_token)
                // return response()->json(['status'=>false,'message'=>'Unauthorized.'],401);
                return redirect('/login',401);
            $token = JWTAuth::setToken($access_token)->getPayload();
            // $decodedToken =$token->toArray();
            return $next($request);
        }
        catch(\Exception $e){               
            // return response()->json(['status'=>false,'message'=>'Unauthorized.'],401);
            // dump($e->getMessage());
            return redirect()->to('/login',302);
        }
    }
}
