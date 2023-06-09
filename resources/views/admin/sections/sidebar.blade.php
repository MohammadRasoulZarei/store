<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion pr-0" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">WebProg.ir</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> داشبورد </span></a>
    </li>
      <div class="sidebar-heading">
        سفارشات
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span> کاربران </span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.users') }}"> لیست کاربران</a>
                <a class="collapse-item" href="{{route('admin.roles.index')}}">  گروه های کابری</a>
                <a class="collapse-item" href="{{route('admin.permissions.index')}}"> پرمیژن</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        فروشگاه
    </div>


    <!-- Nav Item - Brand -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.brands.index') }}">
            <i class="fas fa-store"></i>
            <span> برند ها </span>
        </a>
    </li>
    @role('product-admin')

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-cart-plus"></i>
            <span> محصولات </span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.products.index') }}">محصولات</a>
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">دسته بندی ها</a>
                <a class="collapse-item" href="{{ route('admin.attributes.index') }}">ویژگی ها</a>
                <a class="collapse-item" href="{{ route('admin.tags.index') }}">تگ ها</a>
                <a class="collapse-item" href="{{ route('admin.comments.index') }}">کامنت ها</a>
            </div>
        </div>
    </li>
    @endrole
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        سفارشات
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts2" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span> سفارشات </span>
        </a>
        <div id="collapseProducts2" class="collapse
         {{request()->is('admin-panel*orders*')?'show':''}}
         {{request()->is('admin-panel*transactions*')?'show':''}}
         {{request()->is('admin-panel*coupons*')?'show':''}}
         "aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{request()->is('admin-panel*orders*')?'active':''}}" href=" {{ route('admin.orders') }}"> سفارشات</a>
                <a class="collapse-item {{request()->is('admin-panel*transactions*')?'active':''}}" href="{{ route('admin.transactions') }}"> تراکنش ها</a>
                <a class="collapse-item {{request()->is('admin-panel*coupons*')?'active':''}}" href="{{ route('admin.coupons.index') }}">کوپن ها</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        تنظیمات
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.banners.index') }}">
            <i class="fas fa-store"></i>
            <span> بنرها</span>
        </a>
    </li>





    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>