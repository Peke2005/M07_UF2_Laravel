<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    public function handle(Request $request, Closure $next){
        if (!$this->isValidUrl($request->image_url)) {
            return redirect('/')->withErrors(['error' => 'La URL no es válida.']);
        }

        return $next($request);
    }
    private function isValidUrl($url){
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
