@extends('admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List customner
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List customner</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="search-customer text-right">
                <label>Search</label>
                <input type="text" name="key_word" id="key_word" placeholder="key word...">
              </div>
              <div id="listCustomer">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="w-50">Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th class="w-50 text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listUser as $user)
                <tr>
                  <td class="w-50">{{ $user->id }}</td>
                  <td>
                  	<a href="{{ route('admin.customers.edit', $user->id) }}">{{ $user->name }}</a>
                  </td>
                  <td>
                    {{ $user->email }}
                  </td>
                  <td>
                    {{ $user->phone_number }}
                  </td>
                  <td class="w-100 text-center">
                  	<span class="efit-item text-success action-item">
                      <a href="{{ route('admin.customers.edit', $user->id) }}">
                  		  <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                  	</span>
                  	<span class="delete-item text-danger action-item" data-delete="{{ route('admin.customers.delete', $user->id) }}">
                  		<i class="fa fa-times" aria-hidden="true"></i>
                  	</span>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div class="paginate text-center">
              	{!! $listUser->links() !!}
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection