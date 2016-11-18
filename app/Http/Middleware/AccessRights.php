<?php

namespace App\Http\Middleware;

use App\Page;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
//    public function handle($request, Closure $next)
//    {
//
//        if(!($request -> user('is_admin' == 1))){
//            $user = User::findorfail($request -> route() -> parameter('routeName'));
//            $page = Page::findorfail($request -> path());
//
//            if ($request->user()->id !== $user->id) {
//                return redirect('errors.503')->with('flash_message', '*** Permission denied ***');
//            }
//
//            return $next($request);
//
//        }
//
//        return $next($request);

            public function handle($request, Closure $next)
            {
                $user = Auth::user();
                $path = $request -> route() -> getPath();
                $pages = Page::all();

                if($user->is_admin == 1){
                    return $next($request);
                }

                foreach ($pages as $page) {


                    $page_name = $page -> name;

                    if (strpos($path, $page_name) !== false) {
                        $page_id = $page -> id;
                        break;
                    }
//                    else{
//                        return redirect('errors.503')->with('flash_message', '*** Permission denied ***');
//                    }
                }


                $result = DB::table('page_user')->where('user_id','=',$user->id)->where('page_id','=',$page_id)->exists();

                if($result){

                    return $next($request);

                }

                return redirect('errors.503')->with('flash_message', '*** Permission denied ***');
                //return redirect('home');

            }

}
