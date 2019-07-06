<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item has-treeview">
      <a href="/admin" class="nav-link @if(Route::is('index')) active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Danh mục
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.get.list.category') }}" class="nav-link @if(Route::is('admin.get.list.category')) menu-open @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Danh sách</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.get.create.category') }}" class="nav-link @if(Route::is('admin.get.create.category')) active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Thêm mới</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link @if(Route::is('admin.get.list.category')) menu-open @endif">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Sản phẩm
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.get.list.product') }}" class="nav-link @if(Route::is('admin.get.list.product')) active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Danh sách</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.get.create.product') }}" class="nav-link @if(Route::is('admin.get.create.product')) active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Thêm mới</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link @if(Route::is('admin.get.list.transaction')) menu-open @endif">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Đơn hàng
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.get.list.product') }}" class="nav-link @if(Route::is('admin.get.list.transaction')) active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Danh sách</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.get.create.product') }}" class="nav-link @if(Route::is('admin.get.create.transaction')) active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Thêm mới</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="{{ route('admin.get.list.user') }}" class="nav-link @if(Route::is('admin.get.list.user')) menu-open @endif">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Tài khoản
        </p>
      </a>

    </li>
  </ul>
</nav>