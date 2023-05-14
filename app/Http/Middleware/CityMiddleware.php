<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Area;
use App\Models\City;


class CityMiddleware
{
            // if ($slug != '') {
        //     $city = Area::where('slug', $slug)->get();

        //     if (isset($city)) {
        //         $city = City::where('slug', $slug)->get();

        //         if (isset($city)) {
        //             redirect()->route('home');
        //         }

        //         session()->put('city', [
        //             'name' => $city[0]['name'],
        //             'slug' => $city[0]['slug']
        //         ]);
    
        //     } 
        // }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $cityUrl = session()->get('city');
        $slug = $request->path();

        if ($slug === '/') {
            if (!isset($cityUrl)) {
                return $next($request);
            } else {
                return redirect()->route('home', $cityUrl['slug']);
            }
        }

        $city = Area::where('slug', $slug)->first();
        if (empty($city)) {
            $city = City::where('slug', $slug)->first();
            if (empty($city)) {
                return redirect()->route('home');
            }
        }
        
        session()->put('city', [
            'name' => $city['name'],
            'slug' => $city['slug']
        ]);
    
        return $next($request);
    }
}
