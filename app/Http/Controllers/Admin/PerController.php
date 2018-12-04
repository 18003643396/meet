<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;
class PerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         if(empty($request -> get('keywords'))){
          $res = Permission::paginate(10);

        }else{
            
            
            $per = $request -> get('keywords');
            $res = Permission::where('per_name','like','%'.$per.'%')->paginate(10);
            
             
        }
        return view('admin.permission.index',[
            'title'=>'角色的列表页面',
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
        //
        return view('admin.permission.add',['title'=>'权限添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res = $request->only('per_name','per_url');

         try{

            $data = Permission::create($res);
            
            if($data){
                return redirect('/admin/permission')->with('success','添加成功');
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
        //
        $res = Permission::find($id);

        return view('admin.permission.edit',['title'=>'权限的修改页面','res'=>$res]);
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
        //
        $res = $request->only('url_name','url');

        try{

            $data = Permission::where('id',$id)->update($res);
            
            if($data){
                return redirect('/admin/permission')->with('success','修改成功');
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
        //
        try{

            $data = Permission::where('id',$id)->delete();
            
            if($data){
                return redirect('/admin/permission')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }

    }
    public function alldelete(Request $request)
    {
       
        $ids = $request->ids;
        $id = explode(',',$ids);
       
        foreach ($id as $k => $v) {
             $res = Permission::where('id',$v)->delete();
        }
        if($res){
            echo 1;
        }else{
            echo 0;
        }

        
    }
}