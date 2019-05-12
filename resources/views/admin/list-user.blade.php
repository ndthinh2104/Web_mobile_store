@extends('admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List user
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
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
                  	<a href="#">{{ $user->full_name }}</a>
                  </td>
                  <td>
                    {{ $user->email }}
                  </td>
                  <td>
                    {{ $user->phone }}
                  </td>
                  <td class="w-100 text-center">
                  	<span class="efit-item text-success action-item">
                  		<i class="fa fa-pencil" aria-hidden="true"></i>
                  	</span>
                  	<span class="delete-item text-danger action-item">
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