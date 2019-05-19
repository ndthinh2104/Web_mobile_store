@extends('admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		@if (isset($productType))
			Edit product category
		@else
			Create product category
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
					$action = route('admin.products.cat.create');
					if (isset($productType)){
						$action = route('admin.products.cat.edit', $productType->id);
					}
					@endphp
					<form action="{{ $action }}" method="post" enctype="multipart/form-data">
				        <input type="hidden" name="_token" value="{{csrf_token()}}">
				        <div class="form-group">
				        	@php
				        	$name = '';
				        	if (old('name') != '') {
				        		$name = old('name');
				        	} else if (isset($productType)) {
				        		$name = $productType->name;
					        }
				        	@endphp
					        <label>Name <span class="required-field">*</span></label>
					        <input type="text" class="form-control" name="name" placeholder="Name product" value="{{ $name }}">
				        </div>
					    <div class="form-group">
					    	<label>Description <span class="required-field">*</span></label>
					    	<div class="box-body pad" style="padding: 10px 0;">
					    		@php
					    		$description = '';
					    		if(old('description') != '') {
					    			$description = old('description');
					    		}else if (isset($productType)) {
						    		$description = $productType->description;
						    	}
					    		@endphp
				                <textarea id="editor1" name="description" rows="10" cols="80">{{ $description }}</textarea>
				            </div>
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