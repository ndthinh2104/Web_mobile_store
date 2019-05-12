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

class AdminController extends Controller
{
	/**
	 * function index admin
	 * 
	 * @return view
	 */
	public function getIndex() {
		return view('admin.index');
	}

	/**
	 * function getListProduct
	 *
	 * @return view
	 */
	public function getListProduct() {
		$listProduct = Product::paginate(10);

		return view('admin.list-product', compact('listProduct'));
	}

	/**
	 * function getListProductType
	 *
	 * @return view
	 */
	public function getListProductType() {
		$listProductType = ProductType::paginate(10);

		return view('admin.list-product-type', compact('listProductType'));
	}

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
	 * function getListBill
	 *
	 * @return view
	 */
	public function getListBill() {
		$listBill = Bill::join('customer', 'customer.id', '=' ,'bills.id_customer')
		->select(['bills.id', 'bills.total', 'bills.date_order', 'customer.name'])
		->paginate(10);

		return view('admin.list-bill', compact('listBill'));
	}
}