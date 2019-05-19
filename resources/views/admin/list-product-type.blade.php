@extends('admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Categoies
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product Categoies</li>
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
                  <th class="w-50 text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listProductType as $type)
                <tr>
                  <td class="w-50">{{ $type->id }}</td>
                  <td>
                  	<a href="{{ route('admin.products.cat.edit', $type->id) }}">{{ $type->name }}</a>
                  </td>
                  <td class="w-100 text-center">
                  	<span class="efit-item text-success action-item">
                      <a href="{{ route('admin.products.cat.edit', $type->id) }}"></a>
                  		<i class="fa fa-pencil" aria-hidden="true"></i>
                  	</span>
                  	<span class="delete-item text-danger action-item" data-delete="{{ route('admin.products.cat.delete', $type->id) }}">
                  		<i class="fa fa-times" aria-hidden="true"></i>
                  	</span>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div class="paginate text-center">
              	{!! $listProductType->links() !!}
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