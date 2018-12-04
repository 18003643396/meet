<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use App\Model\Admin\User;
class UserController extends Controller
{
    public function index()
    {

          $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.index',['article'=>$article]);
    }
    public function xiangqing(Request $request)
    {
        
        $id = $request->get('id');
        // dd($id);
        $article = Article::where('user_id',session('uid'))->get();
        $articless = Article::where('id',$id)->first();
         // dd($article);
         // $article = Article::where('user_id',session('uid'))->get();
         return view('home.user.xiangqing',['articless'=>$articless,'article'=>$article]);
        // return view('home.user.xiangqing');
    }
    public function guanzhu()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.guanzhu',['article'=>$article]);
    }
    public function huati()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.huati',['article'=>$article]);
    }
    public function zhuanti()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.zhuanti',['article'=>$article]);
    }
    public function dongtai()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.dongtai',['article'=>$article]);
    }
    public function shijianzhou()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.shijianzhou',['article'=>$article]);
    }
    public function liuyan()
    {
        $article = Article::where('user_id',session('uid'))->get();
    	return view('home.user.liuyan',['article'=>$article]);
    }
    public function search()
    {
    	$article = Article::where('user_id',session('uid'))->get();
        return view('home.user.search',['article'=>$article]);
    }
}
