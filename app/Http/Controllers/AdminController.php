<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request)
    {
    	if ($request->isMethod('post'))
    	{
    		$data = $request->input();
    		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'admin'=>'1']))
    		{
    			// Session::put('adminSession',$data['email']);
    			return redirect('admin/dashboard');
    		}
    		else
    		{
    			return redirect('admin')->with('error','Sai địa chỉ Email hoặc Mật khẩu');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard()
    {
    	// if (Session::has('adminSession'))
    	// {
    	// 	return view('admin/dashboard');
    	// } 
    	// else 
    	// {
    	// 	return redirect('admin')->with('error','Bạn cần đăng nhập trước khi truy cập');
    	// }
    	return view('admin/dashboard');
    }

    public function logout()
    {
    	Session::flush();
    	return redirect('admin')->with('success','Đăng xuất thành công');
    }
}
