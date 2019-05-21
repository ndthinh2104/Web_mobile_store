@extends('admin')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List bill
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List bill</li>
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
                  <th>Customer</th>
                  <th class="w-150 text-center">Date order</th>
                  <th class="w-150 text-center">Total</th>
                  <th class="w-50 text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($listBill as $bill)
                <tr>
                  <td class="w-50">{{ $bill->id }}</td>
                  <td>
                  	<a href="{{route('admin.bills.edit',$bill->id)}}">{{ $bill->name }}</a>
                  </td>
                  <td class="w-100 text-center">{{ $bill->date_order }}</td>
                  <td class="w-100 text-center">{{ $bill->total }}</td>
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
              	{!! $listBill->links() !!}
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