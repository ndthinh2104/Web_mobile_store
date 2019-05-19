@extends('admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List product
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List products</li>
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
                  <th class="w-150 text-center">Unit</th>
                  <th class="w-150 text-center">Price</th>
                  <th class="w-50 text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listProduct as $product)
                <tr>
                  <td class="w-50">{{ $product->id }}</td>
                  <td>
                  	<a href="{{ route('admin.products.edit', $product->id) }}">{{ $product->name }}</a>
                  </td>
                  <td class="w-100 text-center">{{ $product->unit }}</td>
                  <td class="w-100 text-center">{{ $product->unit_price }}</td>
                  <td class="w-100 text-center">
                  	<span class="efit-item text-success action-item">
                      <a href="{{ route('admin.products.edit', $product->id) }}">
                  		  <i class="fa fa-pencil" aria-hidden="true"></i>
                      </a>
                  	</span>
                  	<span class="delete-item text-danger action-item" data-delete="{{ route('admin.products.delete', $product->id) }}">
                  		<i class="fa fa-times" aria-hidden="true"></i>
                  	</span>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div class="paginate text-center">
              	{!! $listProduct->links() !!}
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