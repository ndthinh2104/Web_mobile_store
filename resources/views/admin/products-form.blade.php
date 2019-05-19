@extends('admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		@if (isset($product))
			Edit product
		@else
			Create product
		@endif
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
	        <div class="col-xs-12">
	            <div class="box">
		            <!-- /.box-header -->
		            <div class="box-body">
	            	@if (count($errors) > 0)
			      	<div>
			          	<ul style="padding: 0 0 10px 15px; margin: 0;">
			              	@foreach ($errors->all() as $error)
			                  	<li class="text-danger">{{ $error }}</li>
			              	@endforeach
			          </ul>
			      	</div>
				    @endif
					@php
					$action = route('admin.products.create');
					if (isset($product)){
						$action = route('admin.products.edit', $product->id);
					}
					@endphp
					<form action="{{ $action }}" method="post" enctype="multipart/form-data">
				        <input type="hidden" name="_token" value="{{csrf_token()}}">
				        <input type="hidden" name="unit" value="chiếc">
				        <div class="form-group">
				        	@php
				        	$name = '';
				        	if (old('name') != '') {
				        		$name = old('name');
				        	} else if (isset($product)) {
				        		$name = $product->name;
					        }
				        	@endphp
					        <label>Name <span class="required-field">*</span></label>
					        <input type="text" class="form-control" name="name" placeholder="Name product" value="{{ $name }}">
				        </div>
				        <div class="form-group">
					        <label>Product Category <span class="required-field">*</span></label>
					        <select class="form-control" name="id_type">
					            @foreach($listProductType as $key => $type)
					            @php
					            $selected = '';
					            if (old('id_type') != '' && $key == old('id_type')) {
					            	$selected = 'selected';
					        	} else if(isset($product) && $key == $product->id_type ) {
					            	$selected = 'selected';
					        	}
					            @endphp
					            <option value="{{ $key }}" {{ $selected }}>{{ $type }}</option>
					            @endforeach
					        </select>
					    </div>
					    <div class="form-group">
					    	<label>Description <span class="required-field">*</span></label>
					    	<div class="box-body pad" style="padding: 10px 0;">
					    		@php
					    		$description = '';
					    		if(old('description') != '') {
					    			$description = old('description');
					    		}else if (isset($product)) {
						    		$description = $product->description;
						    	}
					    		@endphp
				                <textarea id="editor1" name="description" rows="10" cols="80">{{ $description }}</textarea>
				            </div>
					    </div>
					    <div class="form-group">
					    	<label>Price <span class="required-field">*</span></label>
					    	@php
					    	$price = '';
					    	if (old('unit_price')) {
					    		$price = old('unit_price');
					   	 	} else if (isset($product)){
					    		$price = $product->unit_price;
					    	}
					    	@endphp
					    	<input type="text" name="unit_price" class="form-control" value="{{ $price }}">
					    </div>
					    <div class="form-group">
					    	<label>Promotion price</label>
					    	@php
					    	$price_promotion = '';
					    	if (old('promotion_price')) {
					    		$price_promotion = old('promotion_price');
					   	 	}else if (isset($product) && $product->promotion_price != 0){
					    		$price_promotion = $product->promotion_price;
					    	}
					    	@endphp
					    	<input type="text" name="promotion_price" class="form-control" value="{{ $price_promotion }}">
					    </div>
					    
					    <div class="form-group">
				            <label for="image">Image <span class="required-field">*</span></label>
				            <input type="file" id="image" name="image">
				            @if (isset($product))
					    	<img id="previewImg" src="/source/image/product/{{$product->image}}" alt="" style="max-width: 100px; margin-top: 20px;">
					    	@else
					    	<img src="" id="previewImg" alt="" style="max-width: 100px; margin-top: 20px;">
					    	@endif

				        </div>
				        <div class="form-group">
				        	<button type="submit" name="submit" class="btn btn-primary">Save</button>
				        </div>
				    </form>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection