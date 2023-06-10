<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <form action="" class="d-flex">
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </form>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Web Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/order')}}" class="nav-link {{request()->route()->getName()==='order.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">Order Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/user')}}" class="nav-link {{request()->route()->getName()==='user.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">User Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">Product Management</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/product')}}" class="nav-link {{request()->route()->getName()==='product.index' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p class="text-info">Products</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/product-category')}}" class="nav-link {{request()->route()->getName()==='product-category.index' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p class="text-info">Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/color')}}" class="nav-link {{request()->route()->getName()==='color.index' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p class="text-info">Color</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/size')}}" class="nav-link {{request()->route()->getName()==='size.index' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p class="text-info">Size</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">Blog Management</p>
                  <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/blog')}}" class="nav-link {{request()->route()->getName()==='blog.index' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p class="text-info">Blogs</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/article-category')}}" class="nav-link {{request()->route()->getName()==='article-category.index' ? 'active' : ''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p class="text-info">Blog's Category</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Web Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/web-setting')}}" class="nav-link {{request()->route()->getName()==='web-setting.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/banner')}}" class="nav-link {{request()->route()->getName()==='banner.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">Banners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/about')}}" class="nav-link {{request()->route()->getName()==='about.index' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="text-info">About</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
