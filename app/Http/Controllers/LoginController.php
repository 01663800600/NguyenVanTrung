<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;



class LoginController extends Controller
{

	public function getLogin()
	{
		return view('pages.dangnhap');
	}  

    public function getAdminLogin()
    {
        return view('admin.login');
    }
    
    //kiem tra dang nhap admin
    public function postAdminDoLogin(Request $request)
    {   
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required|min:3|max:32'
            ],
            [
                'email.required' => 'Khong duoc de chong email',
                'password.required' => 'Khong duoc de chong password',
                'password.min' => 'password lon hon 3 ký tự',
                'password.max' => 'password nhỏ hơn 32'

            ]);


        if (Auth::attempt(['email' => $request->email,'password'=> $request->password])) //dang nhap thanh cong la trả về true
        {   

                return redirect('admin/trangchu');    
        }
        else 
        {
                return redirect('tracnghiem-login-admin')->with('thongbao','Sai thong tin danng nhap khong thanh cong'); 
        }

    }

    // kiem tra dang nhap user
	public function postDoLogin(Request $request)
	{
    	// để dùng được cái đăng nhập phải dung thư viên auth laravel

		$this->validate($request,
			[
				'email' => 'required',
				'password' => 'required|min:3|max:32'
			],
			[
				'email.required' => 'Khong duoc de chong email',
				'password.required' => 'Khong duoc de chong password',
				'password.min' => 'password lon hon 3 ký tự',
				'password.max' => 'password nhỏ hơn 32'

			]);


    	if (Auth::attempt(['email' => $request->email,'password'=> $request->password])) //dang nhap thanh cong la trả về true
    	{	
    		
    		return redirect('');	
    	}
    	else 
    	{

    		return redirect('login')->with('thongbao','Sai thong tin danng nhap khong thanh cong');	

    	}
    }

    //dang xuat
    public function getDoLogout()
    {
    	Auth::logout();
    	return redirect('');
    }
}
