<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(){
    	if(session('admin')){
    		return redirect('jslmadmin/index');
    	}
    	return view('Admin.login.index',['title'=>'登入']);
    }

    public function dologin(Request $request){
      $this->validate($request, [
        'name' => 'required|min:6|max:16',
        'mima' => 'required',
       ],[
       'name.required'=>'用户名不能为空',
       'name.min'=>'name必须6个字符',
       'name.max'=>'name必须小于18位',
       'mima.required'=>'密码不能为空',
       ]);

      $data = $request->except('_token'); 

      $res = \DB::table('admin_users')->where('name',$data['name'])->first();
      if(!$res){
      	return back()->withInput()->with(['info'=>'用户名或密码错误']);
      }

      $mima = \Hash::check($data['mima'], $res->mima);
		if(!$mima){
      	return back()->withInput()->with(['info'=>'用户名或密码错误']);
		}else{
		
		\session(['admin'=>$res]);
		return redirect('/jslmadmin/index')->with(['info'=>'登入成功！']);
		}
        
    }
    public function jslmext(){
    	\session()->forget('admin');
    	return redirect('/jslmadmin/login');
    }
}
