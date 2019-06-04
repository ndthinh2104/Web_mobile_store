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
use Validator;

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
			$aryRet['data'] = view('admin.list-customer-search', compact('listCustomer'))->render();
		}

		return json_encode($aryRet);
	}


	/**
	 * function getCreateCustomer
	 *
	 * return view
	 */
	public function getCreateCustomer() {
		return view('admin.customer-form');
	}

	/**
	 * function postCreateCustomers
	 *
	 * @param Request $request
	 *
	 * @return view
	 */
	public function postCreateCustomers(Request $request) {
		$validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            'phone_number'    => 'required',
            'address'  => 'required',
            'note'		=> 'required|max:200'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$customer = new Customer();
	        $customer->fill($request->input());

	        $result = $customer->save();
	        
	        if ($result) {
				return redirect()->route('admin.customers.list');
			} else {
				return back()->withInput($request->input());
			}
		}
	}

	/**
	 * function getEditCustomer
	 * 
	 * @param int $id
	 *
	 * return view
	 */
	public function getEditCustomer($id) {
		$customer = Customer::findOrFail($id);

		return view('admin.customer-form', compact('customer'));
	}

	/**
	 * function postEditUser
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return view;
	 */
	public function postEditCustomer($id, Request $request) {
		$validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            'phone_number'    => 'required',
            'address'  => 'required',
            'note'		=> 'required|max:200'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$customer = Customer::findOrFail($id);
	        $customer->fill($request->input());

	        $result = $customer->save();

			if ($result) {
				return redirect()->route('admin.customers.list');
			} else {
				return back()->withInput($request->input());
			}
		}
	}


    /**
     * function getDeleteCustomer
     * @param int $id
     * @return BaseHttpResponse
     */
    public function getDeleteCustomer($id)
    {
        $aryRet = [
        	'status' => 0,
        	'message' => ''
        ];

        $customer = Customer::findOrFail($id);
        if ($customer) {
        	$result = $customer->delete();
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