<?php

namespace App\Http\Middleware;
use App\Category;
use Closure;

class checkCategory
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
        $count = Category::all()->count();
        if ($count == 0) {
            session()->flash('error' , 'You Must Have at least one Category');
            return redirect(route('categories.index'));
        }
            return $next($request);
    }
}
