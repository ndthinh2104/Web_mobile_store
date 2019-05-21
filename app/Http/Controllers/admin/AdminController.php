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
use Illuminate\Support\Facades\DB;

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
	public function getEditBill($id) {
		$bill = Bill::findOrFail($id);
		$billdetail = DB::table('bill_detail')->where('bill_detail.id_bill','=',$id)->get();
		$product = [];
		foreach($billdetail as $pro){

			$product[]=DB::table('products')->where('products.id','=',$pro->id_product)->first();
		}
		return view('admin.bill-detail-form', compact('bill','product'));
	}
}