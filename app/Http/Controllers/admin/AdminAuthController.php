<?php

namespace App\Http\Controllers\admin;

use Session;
use App\User;
use Hash;
use Auth;
use App\Http\Controllers\Controller;
use Validator;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
	/**
	 * function login admin
	 * 
	 * @return view
	 */
	public function getLogin() {
		return view('admin.login');
	}

	/**
	 * function post login admin
	 * 
	 * @param Request $req
	 * 
	 * @return view
	 */
	public function postLogin(Request $req){
        $data = $req->input();

        //validate data input
        $validations = Validator::make($data,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );

        if ($validations->fails()) {
        	return redirect()->back()->with('message', $validations->messages()->toArray());
        }

        //add session for user
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = User::where([
                ['email','=',$req->email]
            ])->first();
        if($user){
            if(Auth::attempt($credentials)){
            	return redirect(route('admin'));
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        else{
           return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản chưa kích hoạt']); 
        }
        
    }
}