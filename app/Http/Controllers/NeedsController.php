<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Need;
use Carbon\Carbon;
use Input;


class NeedsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',[
            // 'except'=>['create','store']
        ]);
    }
    //
    public function create()
    {
        $users=User::all();
        return view('needs.create',compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'program' => 'required|max:50',
            'game' => 'required|max:50',
            'name' => 'required|max:50',
            'doby' => 'required|max:50',
            'description' =>'required',
            'process' => 'required',
        ]);
             
        $need = Need::create([
            'game' => $request->game,
            'program' => $request->program,      
            'name' => $request->name,
            'process' => $request->process,
            'description' => $request->description,
            'picurl' => $request->picurl,
            'createby'=> Auth::user()->name,
            'sendby'=> Auth::user()->name,
            'doby' =>$request->doby,
            'starttime' =>Carbon::now(),
            'endtime' =>Carbon::now(),
            'status' =>'1',
            'records' => '{}'
        ]);

        session()->flash('success','发布成功！');
        return redirect()->route('users.show',Auth::user());
      
    }

    public function show($need_id)
    {
        $need= Need::where('id',$need_id)->firstOrFail(); 
        $users=User::all();     
        return view('needs.show',compact('need','users'));
    }

    public function update(Need $need,Request $request)
    {
        $this->validate($request,[
            'doby' => 'required|max:50',
            'description' =>'required'
        ]);
        
        $old_need=Need::where('id',$need->id)->firstOrFail();
        $old_records=json_decode($old_need->records , true);  //获得数据库中的record
        $index=count($old_records)+1; //生成下一次数组的索引
        
        $new_records=[];   //新添加的记录
        $new_records['sendby'] = $old_need->sendby;
        $new_records['doby'] =$old_need->doby;
        $new_records['description'] =$old_need->description;
        $new_records['picurl'] =$old_need->picurl;
        $new_records['starttime']=$old_need->starttime;
        $new_records['endtime']='2019-05-25 15:18:23';
        //$new_records['log']=$request->log;  提交日志

        $old_records[$index]=$new_records; //添加到原来的记录中

        $data = [];     //更新数据库
        $data['sendby'] = Auth::user()->name;
        $data['doby'] =$request->doby;
        $data['description'] =$request->description;
        $data['picurl'] =$request->picurl;
        $data['starttime']=Carbon::now();
        $data['records'] = json_encode($old_records, true);
        $need->update($data);

        session()->flash('success','推动成功！');

        return redirect()->route('users.show',Auth::user());

    }


}
