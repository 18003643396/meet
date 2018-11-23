<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConservatorRequest;

use Hash;
use App\Model\Admin\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request -> get('keywords'))){
          $res = User::paginate(10);

        }else{
            
            if($request -> get('search') === 'name'){
                $name = $request -> get('keywords');
            $res = User::where('name','like','%'.$name.'%')->paginate(10);
             }
             if($request -> get('search') === 'email'){
                $email = $request -> get('keywords');
                 $res = User::where('email','like','%'.$email.'%')->paginate(10);
             }
             if($request -> get('search') === 'tel'){
                $tel = $request -> get('keywords');
                 $res = User::where('tel','like','%'.$tel.'%')->paginate(10);
             }
             if($request -> get('search') === 'sex'){
                    if($request -> get('keywords') == '男'){
                        $sex = '1';
                    }
                    if($request -> get('keywords') == '女'){
                        $sex = '0';
                    }
                    if($request -> get('keywords') == '保密'){
                        $sex = '2';
                    }
                 $res = User::where('sex',$sex)->paginate(10);
             }
 
        }
        return view('admin.user.index',[
                'title'=>'用户列表',
                'res'=>$res  
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.user.add',['title'=>'添加用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConservatorRequest $request)
    {
        $res =$request->except('_token','img','repass');
        // dump($res);
        if($request->hasFile('img')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();

            $request->file('img')->move('./uploads',$name.'.'.$suffix);

            $res['img'] = '/uploads/'.$name.'.'.$suffix;

        }

        //网数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);

     

        try{

            $data = User::create($res);
            dump($data);
            if($data){
                return redirect('admin/user')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $res = User::find($id);

         return view('admin.user.edit',[
            'title'=>'用户的修改页面',
            'res'=>$res
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res =$request->except('_token','img','_method');
      
            
            if($request->hasFile('img')){
                //自定义名字
                $name = rand(111,999).time();
                //获取后缀
                $suffix = $request->file('img')->getClientOriginalExtension();

                $request->file('img')->move('./uploads',$name.'.'.$suffix);

                $res['img'] = '/uploads/'.$name.'.'.$suffix;

            }

            // dump($res);
            try{

                $data = User::where('id',$id)->update($res);
                if($data){
                    return redirect('/admin/user')->with('success','修改成功');
                }else{
                     return redirect('/admin/user')->with('success','修改成功');
                }

            }catch(\Exception $e){

                return back()->with('error','修改失败');
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $res = User::destroy($id);
            
            if($res){
                return redirect('/admin/user')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
    //改用户名
     public function ajaxupdate(Request $request)
    {

       
     
        $res = [];

        $id = $request->ids;

        $res['name'] = $request->uv;
       
        $rs = User::where('name', $request->uv)->first();
        
        if($rs){
            echo 2;
        }else{
            //修改数据
            $data = User::where('id',$id)->update($res);

            if($data){

                echo 1;
            } else {

                echo 0;
            }
        }

    }
    //批量删除
    public function alldelete(Request $request)
    {
       
        $ids = $request->ids;
        $id = explode(',',$ids);
        
        foreach ($id as $k => $v) {
             $res = User::where('id',$v)->delete();
        }
        if($res){
            echo 1;
        }else{
            echo 0;
        }

        
    }
}
