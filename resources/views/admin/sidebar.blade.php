<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li @if(url()->current() == route('admin')) class="active" @endif>
          <a href="{{ route('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
        <li @if(url()->current() == route('admin.products.list')) class="active" @endif class="treeview">
          <a href="#">
            <i class="fa fa-mobile" style="font-size: 18px;"></i>
            <span>Products</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.products.list') }}"><i class="fa fa-circle-o"></i> List products</a></li>
            <li><a href="{{ route('admin.products.create') }}"><i class="fa fa-circle-o"></i> Add product</a></li>
          </ul>
        </li>
        <li @if(url()->current() == route('admin.products.cat')) class="active" @endif class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Product categories</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.products.cat') }}"><i class="fa fa-circle-o"></i> List product categories</a></li>
            <li><a href="{{ route('admin.products.cat.create') }}"><i class="fa fa-circle-o"></i> Add product category</a></li>
          </ul>
        </li>
        <li @if(url()->current() == route('admin.customers.list')) class="active" @endif>
          <a href="{{ route('admin.customers.list') }}">
            <i class="fa fa-user"></i> <span>Customers</span>
          </a>
        </li>
        <li @if(url()->current() == route('admin.users.list')) class="active" @endif class="treeview">
          <a href="#">
            <i class="fa fa-user-circle-o"></i> <span>User</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.users.list') }}"><i class="fa fa-circle-o"></i> List users</a></li>
            <li><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i> Add user</a></li>
          </ul>
        </li>
        <li @if(url()->current() == route('admin.bills.list')) class="active" @endif>
          <a href="{{ route('admin.bills.list') }}">
            <i class="fa fa-address-book-o"></i> <span>Bills</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
