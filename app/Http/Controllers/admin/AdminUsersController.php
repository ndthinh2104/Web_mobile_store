<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\User;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;
use Hash;
use Auth;
use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
	/**
	 * function getListUser
	 *
	 * @return view
	 */
	public function getListUser() {
		$listUser = User::paginate(10);
		$name_page = 'List user';
		return view('admin.list-user', compact('listUser', 'name_page'));
	}

	/**
	 * function getCreateUser
	 *
	 * return view
	 */
	public function getCreateUser() {
		return view('admin.user-form');
	}

	/**
	 * function postCreateUser
	 *
	 * @param Request $request
	 *
	 * @return view
	 */
	public function postCreateUser(Request $request) {
		$validator = Validator::make($request->all(), [
            'full_name'     => 'required|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:6|confirmed',
            'phone'    => 'required',
            'address'  => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$user = new User();
	        $user->fill($request->input());
	        $user->password = Hash::make($request->password);
	        $user->status = 0;

	        $result = $user->save();
	        
	        if ($result) {
				return redirect()->route('admin.users.list');
			} else {
				return back()->withInput($request->input());
			}
		}
	}

	/**
	 * function getEditUser
	 * 
	 * @param int $id
	 *
	 * return view
	 */
	public function getEditUser($id) {
		$user = User::findOrFail($id);

		return view('admin.user-form', compact('user'));
	}

	/**
	 * function postEditUser
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return view;
	 */
	public function postEditUser($id, Request $request) {
		$validator = Validator::make($request->all(), [
            'full_name'=> 'required|max:255',
            'email'    => 'required|email',
            'phone'    => 'required',
            'address'  => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$user = User::findOrFail($id);
	        $user->fill($request->input());

	        $result = $user->save();

			if ($result) {
				return redirect()->route('admin.users.list');
			} else {
				return back()->withInput($request->input());
			}
		}
	}


    /**
     * function getDeleteUser
     * @param int $id
     * @return BaseHttpResponse
     */
    public function getDeleteUser($id)
    {
        $aryRet = [
        	'status' => 0,
        	'message' => ''
        ];

        $user = User::findOrFail($id);
        if ($user) {
        	$result = $user->delete();
        	if ($result) {
        		$aryRet['status'] = 1;
        		$aryRet['message'] = 'Delete success';
        	} else {
        		$aryRet['message'] = 'Delete false';
        	}
        } else {
        	$aryRet['message'] = 'Delete false';
        }

        return json_encode($aryRet);
    }
}