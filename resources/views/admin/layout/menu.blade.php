@php
    $nameRoute = Route::currentRouteName();
@endphp
<nav class="navbar-default navbar-side" role="navigation">
    <div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li @if ($nameRoute == 'admin.users.list') class="active-menu" @endif>
                <a href="{{ route('admin.users.list') }}"><i class="fa fa-dashboard"></i> Users</a>
            </li>
            <li @if ($nameRoute == 'admin.category.list') class="active-menu" @endif>
                <a href="{{ route('admin.category.list') }}"><i class="fa fa-dashboard"></i> Category</a>
            </li>
            <li @if ($nameRoute == 'admin.product.list') class="active-menu" @endif>
                <a href="{{ route('admin.product.list') }}"><i class="fa fa-dashboard"></i> Product</a>
            </li>
            <li @if ($nameRoute == 'admin.product.confirm') class="active-menu" @endif>
                <a href="{{ route('admin.product.confirm') }}"><i class="fa fa-dashboard"></i> Confirm</a>
            </li>
            <li>
                <a href="{{ route('admin.authenticate.logout') }}"><i class="fa fa-dashboard"></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>
