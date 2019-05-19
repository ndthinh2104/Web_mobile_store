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

class AdminCustomersController extends Controller
{
	/**
	 * function getListCustomer
	 *
	 * @return view
	 */
	public function getListCustomer() {
		$listUser = Customer::paginate(10);
		$name_page = 'List customer';
		return view('admin.list-customer', compact('listUser', 'name_page'));
	}
}