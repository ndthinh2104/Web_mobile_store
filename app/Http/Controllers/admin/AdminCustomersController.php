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

	/**
	 * function getSearchCustomer
	 * 
	 * @param Request $request
	 *
	 * @return json
	 */
	public function getSearchCustomer(Request $request) {
		$aryRet = [
			'status' => 0,
			'data' => ''
		];

		$key_word = $request->input('key_word');
		$listCustomer = Customer::select('*');
		if ($key_word != '') {
			$listCustomer = $listCustomer->orWhere('name', 'like', '%' . $key_word . '%')
				->orWhere('phone_number', 'like', '%' . $key_word . '%')
				->orWhere('email', 'like', '%' . $key_word . '%');
		}
			
		$listCustomer = $listCustomer->paginate(10);

		if ($listCustomer) {
			$aryRet['status'] = 1;
			$aryRet['data'] = view('admin.list-customer-search', compact('listCustomer', 'name_page'))->render();
		}

		return json_encode($aryRet);
	}
}