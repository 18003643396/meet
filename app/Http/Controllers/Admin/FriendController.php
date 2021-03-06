<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FriendRequest;
use App\Model\Admin\Friend;
class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(empty($request -> get('keywords'))){
          $res = Friend::paginate(10);

        }else{
            
            
            $name = $request -> get('keywords');
            $res = Friend::where('name','like','%'.$name.'%')->paginate(10);
            
             
        }
        return view('admin.friend.index',[
                'title'=>'友情链接列表',
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
          return view('admin.friend.add',['title'=>'添加友情链接']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FriendRequest $request)
    {
        $res =$request->except('_token');

        try{

            $data = Friend::create($res);
            
            if($data){
                return redirect('admin/friend')->with('success','添加成功');
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
         $res = Friend::find($id);

         return view('admin.friend.edit',[
            'title'=>'友情链接的修改页面',
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
    public function update(FriendRequest $request, $id)
    {
        $res =$request->except('_token','_method');
      
        
            try{

                $data = Friend::where('id',$id)->update($res);
                if($data){
                    return redirect('/admin/friend')->with('success','修改成功');
                }else{
                     return redirect('/admin/friend')->with('success','修改成功');
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

            $res = Friend::destroy($id);
            
            if($res){
                return redirect('/admin/friend')->with('success','删除成功');
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
             $res = Friend::where('id',$v)->delete();
        }
        if($res){
            echo 1;
        }else{
            echo 0;
        }

        
    }
}
