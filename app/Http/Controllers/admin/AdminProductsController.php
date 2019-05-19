<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\ProductType;
use Session;
use App\User;
use Auth;
use Validator;

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
		$listProduct = Product::orderBy('id', 'DESC')->paginate(10);

		return view('admin.list-product', compact('listProduct'));
	}

	/**
	 * function getListProductType
	 *
	 * @return view
	 */
	public function getListProductType() {
		$listProductType = ProductType::orderBy('id', 'DESC')->paginate(10);

		return view('admin.list-product-type', compact('listProductType'));
	}

	/**
	 * function getCreateProduct
	 *
	 * return view
	 */
	public function getCreateProduct() {
		$listProductType = ProductType::pluck('name', 'id')->all();
		return view('admin.products-form', compact('listProductType'));
	}

	/**
	 * function PostCreateProduct
	 * 
	 * @param Request $request
	 *
	 * @return view
	 */
	public function postCreateProduct(Request $request) {
		$validator = Validator::make($request->all(), [
            'name'			=> 'required',
            'id_type'    	=> 'required',
            'unit' 			=> 'required',
            'description'  => 'required',
            'unit_price'  	=> 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$product = new Product();
	        $product->fill($request->input());

	        if (isset($request->image)) {
				$file = $request->image;
				$path = public_path() . '/source/image/product';
	        	$file->move($path, $file->getClientOriginalName());
	        	$product->image = $file->getClientOriginalName();
			}

	        $result = $product->save();
	        
	        if ($result) {
				return redirect()->route('admin.products.list');
			} else {
				return back()->withInput($request->input());
			}
		}
	}

	/**
	 * function getEditProduct
	 * 
	 * @param int $id
	 *
	 * return view
	 */
	public function getEditProduct($id) {
		$product = Product::findOrFail($id);

		$listProductType = ProductType::pluck('name', 'id')->all();
		return view('admin.products-form', compact('product', 'listProductType'));
	}

	/**
	 * function postEditProduct
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return view;
	 */
	public function postEditProduct($id, Request $request) {
		$validator = Validator::make($request->all(), [
            'name'			=> 'required',
            'id_type'    	=> 'required',
            'unit' 			=> 'required',
            'description'  => 'required',
            'unit_price'  	=> 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$product = Product::findOrFail($id);
	        $product->fill($request->input());

	        if (isset($request->image)) {
				$file = $request->image;
				$path = public_path() . '/source/image/product';
	        	$file->move($path, $file->getClientOriginalName());
	        	$product->image = $file->getClientOriginalName();
			}

	        $result = $product->save();

			if ($result) {
				return redirect()->route('admin.products.list');
			} else {
				return back()->withInput($request->input());
			}
		}

	}


    /**
     * function getDeleteProduct
     * @param int $id
     * @return json
     */
    public function getDeleteProduct($id)
    {
        $aryRet = [
        	'status' => 0,
        	'message' => ''
        ];

        $product = Product::findOrFail($id);
        if ($product) {
        	$result = $product->delete();
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

    /**
	 * function getCreateProductType
	 *
	 * return view
	 */
	public function getCreateProductType() {
		return view('admin.products-type-form');
	}

	public function postCreateProductType(Request $request) {
		$validator = Validator::make($request->all(), [
            'name'			=> 'required',
            'description'  => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$productType = new ProductType();
	        $productType->fill($request->input());
	        $productType->image = '';
	        $result = $productType->save();
	        
	        if ($result) {
				return redirect()->route('admin.products.cat');
			} else {
				return back()->withInput();
			}
		}
	}

	/**
	 * function getEditProductType
	 * 
	 * @param int $id
	 *
	 * return view
	 */
	public function getEditProductType($id) {
		$productType = ProductType::findOrFail($id);

		return view('admin.products-type-form', compact('productType'));
	}

	/**
	 * function postEditProductType
	 *
	 * @param int $id
	 * @param Request $request
	 *
	 * @return view;
	 */
	public function postEditProductType($id, Request $request) {
		$validator = Validator::make($request->all(), [
            'name'			=> 'required',
            'description'  => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)
                    ->withInput($request->input());
        } else {
			$productType = ProductType::findOrFail($id);
	        $productType->fill($request->input());
	        $productType->image = '';
	        $result = $productType->save();

			if ($result) {
				return redirect()->route('admin.products.cat');
			} else {
				return back()->withInput();
			}
		}
	}


    /**
     * function getDeleteProductType
     * @param int $id
     * @return BaseHttpResponse
     */
    public function getDeleteProductType($id)
    {
        $aryRet = [
        	'status' => 0,
        	'message' => ''
        ];

        $productType = ProductType::findOrFail($id);
        if ($productType) {
        	$result = $productType->delete();
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