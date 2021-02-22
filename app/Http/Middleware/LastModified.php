<?php

namespace App\Http\Middleware;

use Closure;
use Route;

/**
 * Class LastModified.
 *
 *
 * @todo
 */
class LastModified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = Route::getRoutes()->match($request);
        dd($route->getActionName());

        $response = $next($request);

        //// URL path
        //
        //
        //// Lookup Model for resource path
        //
        //
        //// Lookup updated_at
        //
        //
        //// spit out header
        //$response->headers->set('Last-Modified', date(DATE_RFC822, File::lastModified($path)) );

        // continue

        return $response;
    }
}

//Last-Modified: <day-name>, <day> <month> <year> <hour>:<minute>:<second> GMT
//Note: The Last-modified header looks like this: Last-Modified: Tue, 15 Oct 2019 12:45:26 GMT
//
//Directives:
//
//<day-name>: It contains the days name like “Mon”, “Tue” etc. (case-sensitive).
//<day>: It contains the date in 2 digit number, like “04” or “23” for days.
//<month>: It contains the name of the month, in 3 letter month names like “Jan”, “Feb” etc.(case-sensitive).
//<year>: In contains the 4 digit year like “2009”
//<hour>: It contains the hour in 2 digit hour like “07” or “12”.
//<minute>: Same as hour minutes 2 digit minute like “09” or “55”
//<second>: Containing the seconds in 2 digit second like “08” or “50”.
//GMT: All the dates in HTTP will show in Greenwich Mean Time format not in local time format.
//Example:
//
//Last-Modified: Tue, 15 Oct 2019 12:45:26 GMT
