<?php

namespace App\Http\Middleware;
use App\Model\Admin\Conservator;
use Closure;

class Conpermission
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
    	$cid = session('cid');
    	$users = Conservator::find($cid);

        //通过用户的信息查找角色
        $roles = $users->roles;

        $pers = [];
        foreach($roles as $k => $role_id){
             //通过角色查找权限
            $rles = $role_id->pers;

            foreach($rles as $k => $v){

                $pers[] =$v->per_url;
            }

        }
        // dd($pers);
        $urls = array_unique($pers);

        $active = \Route::current()->getActionName();

        //判断 该用户有哪些权限
        if(in_array($active,$urls)){

            //如果角色有权限
            return $next($request);
        } else {

            //如果角色没有权限  提示页面  没有权限不能访问
            return redirect('/admin/remind');

        }
       
    }
}
