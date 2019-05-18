<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Session;
use App\User;
use Hash;
use Auth;

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
}