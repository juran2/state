<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Need;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['show','create','store']
        ]);

        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50|unique:users',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:6',
            'belong' => 'required',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'belong' => $request->belong,
        ]);

        session()->flash('success','注册成功！');
        return redirect('/');
      
    }

    public function show(User $user)
    {
        $needs=Need::all();
        $dobys=Need::where('doby',Auth::user()->name)->get();
        $sendbys=Need::where('createby',Auth::user()->name)->get();
        return view('users.show',compact('user','statuses','needs','dobys','sendbys'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    //更新资料和删除用户需要是本人操作
    public function update(User $user,Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] =$request->name;
        $data['sex'] =$request->sex;
        $data['special_words'] =$request->special_words;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success','个人资料更新成功！');

        return redirect()->route('users.show',$user);

    }


    
}
