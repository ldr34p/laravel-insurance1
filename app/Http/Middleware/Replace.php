<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ShortCode;

class Replace
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);


        $html = $response->getContent();
        $shortcodes = ShortCode::all();
        foreach ($shortcodes as $shortcode) {
            $search = '[' . $shortcode->shortcode . ']';
            $html = str_replace($search, $shortcode->replace, $html);
        }

        $response->setContent($html);

        return $response;
    }
}
