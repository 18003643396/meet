<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConservatorRequest;
use App\Http\Requests\ConupdateRequest;
use Hash;
use App\Model\Admin\Conservator;

class ConservatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request -> get('keywords'))){
          $res = Conservator::paginate(10);

        }else{
            $condition = [];
            if($request -> get('search') === 'name'){
                $name = $request -> get('keywords');
            $res = Conservator::where('name','like','%'.$name.'%')->paginate(10);
             }
             if($request -> get('search') === 'email'){
                $email = $request -> get('keywords');
                 $res = Conservator::where('email','like','%'.$email.'%')->paginate(10);
             }
             if($request -> get('search') === 'tel'){
                $tel = $request -> get('keywords');
                 $res = Conservator::where('tel','like','%'.$tel.'%')->paginate(10);
             }

        }
        return view('admin.conservator.index',[
                'title'=>'管理员列表',
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
        return view('admin.conservator.add',['title'=>'添加管理员']);
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
        if($request->hasFile('img')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();

            $request->file('img')->move('./uploads/conservator',$name.'.'.$suffix);

            $res['img'] = '/uploads/conservator/'.$name.'.'.$suffix;

        }

        // //网数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);

        //加密 解密 
      /*  $res['password'] = encrypt($request->password);*/
       
        //存数据

        try{

            $data = Conservator::create($res);
            
            if($data){
                return redirect('/admin/conservator')->with('success','添加成功');
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
         $res = Conservator::find($id);

         return view('admin.conservator.edit',[
            'title'=>'管理员的修改页面',
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
    public function update(ConupdateRequest $request, $id)
    {
        $res =$request->except('_token','img','_method');
      
            
            if($request->hasFile('img')){
                //自定义名字
                $name = rand(111,999).time();
                //获取后缀
                $suffix = $request->file('img')->getClientOriginalExtension();

                $request->file('img')->move('./uploads/conservator',$name.'.'.$suffix);

                $res['img'] = '/uploads/conservator/'.$name.'.'.$suffix;

            }

            // dump($res);
            try{

                $data = Conservator::where('id',$id)->update($res);
                if($data){
                    return redirect('/admin/conservator')->with('success','修改成功');
                }else{
                     return redirect('/admin/conservator')->with('success','修改成功');
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

            $res = Conservator::destroy($id);
            
            if($res){
                return redirect('/admin/conservator')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
    public function ajaxupdate(Request $request)
    {

       
     
        $res = [];

        $id = $request->ids;

        $res['name'] = $request->uv;
       
        $rs = Conservator::where('name', $request->uv)->first();
        
        if($rs){
            echo 2;
        }else{
            //修改数据
            $data = Conservator::where('id',$id)->update($res);

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
             $res = Conservator::where('id',$v)->delete();
        }
        if($res){
            echo 1;
        }else{
            echo 0;
        }

        
    }

    //修改管理员状态
    public function kgajax(Request $request)
    {
         $id = $request->ids;
         $status = $request ->status; 
        

         $data = Conservator::where('id',$id)->update(['status'=>$status]);
         if($data){

                echo 1;
            } else {

                echo 0;
            }
    }
}
