<?php

namespace App\Http\Middleware;

use Closure;

class CacheControl
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
        if ($this->isPublicAsset($request->path())) {
            $response = $next($request);
            $response->header('Cache-Control', 'max-age=31536000');
            return $response;
        }

        return $next($request);
    }

    /**
     *
     * @return bool
     */
    private function isPublicAsset(string $url) {
        $publicAssetPrefixes = ['img', 'js', 'css'];

        foreach ($publicAssetPrefixes as $prefix) {
            if (str_starts_with($url, '/' . $prefix)) {
                return true;
            }
        }

        return false;
    }
}
