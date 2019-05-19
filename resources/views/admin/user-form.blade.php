@extends('admin')
@section('content')
@php
$disabled = '';
if (isset($user) && $user->id != Auth::user()->id) {
	$disabled = 'disabled';
}

@endphp
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
		@if (isset($user))
			Edit user
		@else
			Create user
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
					$action = route('admin.users.create');
					if (isset($user)){
						$action = route('admin.users.edit', $user->id);
					}
					@endphp
					<form action="{{ $action }}" method="post" enctype="multipart/form-data">
				        <input type="hidden" name="_token" value="{{csrf_token()}}">
				        <div class="form-group">
				        	@php
				        	$name = '';
				        	if (old('name') != ''){
				        		$name = old('full_name');
				        	} else if (isset($user)){
				        		$name = $user->full_name;
					        }
				        	@endphp
					        <label>Name <span class="required-field">*</span></label>
					        <input type="text" class="form-control" name="full_name" placeholder="Full name" value="{{ $name }}" {{ $disabled }}>
				        </div>
				        <div class="form-group">
				        	@php
				        	$email = '';
				        	if (old('email') != '') {
				        		$email = old('email');
				        	} else if (isset($user)) {
				        		$email = $user->email;
				        	}
				        	@endphp
					        <label>Email <span class="required-field">*</span></label>
					        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $email }}" {{ $disabled }}>
				        </div>
				        @if (!isset($user))
				        <div class="form-group">
					        <label>Password <span class="required-field">*</span></label>
					        <input type="password" class="form-control" name="password">
				        </div>
				        <div class="form-group">
					        <label>Password confirm <span class="required-field">*</span></label>
					        <input type="password" class="form-control" name="password_confirmation">
				        </div>
				        @endif

				        <div class="form-group">
				        	@php
				        	$phone = '';
				        	if (old('phone') != '') {
				        		$phone = old('phone');
				        	} else if (isset($user)) {
				        		$phone = $user->phone;
				        	}

				        	@endphp
					        <label>Phone <span class="required-field">*</span></label>
					        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $phone }}" {{ $disabled }}>
				        </div>

				        <div class="form-group">
				        	@php
				        	$address = '';
				        	if (old('address') != '') {
				        		$address = old('address');
				        	} else if (isset($user)) {
				        		$address = $user->address;
				        	}
				        	@endphp
					        <label>Address <span class="required-field">*</span></label>
					        <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $address }}" {{ $disabled }}>
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