<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\ProductType;
use Session;
use App\User;
use Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
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

}