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
  @foreach($listCustomer as $user)
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
	{!! $listCustomer->links() !!}
</div>