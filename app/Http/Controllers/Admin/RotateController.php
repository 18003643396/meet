<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RotateRequest;
use App\Http\Requests\RotateupRequest;
use App\Model\Admin\Rotate;
class RotateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
          $res = Rotate::paginate(5);

       
        return view('admin.rotate.index',[
                'title'=>'轮播图列表',
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
          return view('admin.rotate.add',['title'=>'添加轮播图']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RotateRequest $request)
    {
        $res =$request->except('_token','img');
        if($request->hasFile('img')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();

            $request->file('img')->move('./rotates',$name.'.'.$suffix);

            $res['img'] = '/rotates/'.$name.'.'.$suffix;

        }
        try{

            $data = Rotate::create($res);
            
            if($data){
                return redirect('admin/rotate')->with('success','添加成功');
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
         $res = Rotate::find($id);

         return view('admin.rotate.edit',[
            'title'=>'轮播图的修改页面',
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
    public function update(RotateupRequest $request, $id)
    {
        $res =$request->except('_token','_method','img');
      
        if($request->hasFile('img')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $suffix = $request->file('img')->getClientOriginalExtension();

            $request->file('img')->move('./rotates',$name.'.'.$suffix);

            $res['img'] = '/rotates/'.$name.'.'.$suffix;

        }
            try{

                $data = Rotate::where('id',$id)->update($res);
                if($data){
                    return redirect('/admin/rotate')->with('success','修改成功');
                }else{
                     return redirect('/admin/rotate')->with('success','修改成功');
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

            $res = Rotate::destroy($id);
            
            if($res){
                return redirect('/admin/rotate')->with('success','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }

     //批量删除
    public function alldelete(Request $request)
    {
       
        $ids = $request->ids;
        $id = explode(',',$ids);
       
        foreach ($id as $k => $v) {
             $res = Rotate::where('id',$v)->delete();
        }
        if($res){
            echo 1;
        }else{
            echo 0;
        }

        
    }
}
