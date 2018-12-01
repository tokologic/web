<div class="sidebar-content">
    <div class="media">
        <a class="pull-left has-notif avatar" href="page-profile.html">
            <img src="{{asset('img/blank-avatar.jpeg')}}" alt="admin">
            <i class="online"></i>
        </a>
        <div class="media-body">
            @if(Sentinel::check())
            <h4 class="media-heading">{{ __('Hello') }}, <span>{{ Sentinel::getUser()->first_name }}</span></h4>
            <small>{{ implode(',', Sentinel::getUser()->roles->pluck('name')->toArray()) }}</small>
            @endif
        </div>
    </div>
</div><!-- /.sidebar-content -->
<ul class="sidebar-menu">

    <li>
        <a href="{{url('/')}}">
            <span class="icon"><i class="fa fa-tachometer"></i></span>
            <span class="text">Dashboard</span>
        </a>
    </li>

    @if(Sentinel::hasAnyAccess(['user.view']))
    <li>
        <a href="{{route('users.index')}}">
            <span class="icon"><i class="fa fa-user"></i></span>
            <span class="text">Users</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['midwive.view']))
    <li>
        <a href="{{route('midwives.index')}}">
            <span class="icon"><i class="fa fa-users"></i></span>
            <span class="text">Midwives</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['category.view']))
    <li>
        <a href="{{route('categories.index')}}">
            <span class="icon"><i class="fa fa-tags"></i></span>
            <span class="text">Categories</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['brand.view']))

    <li>
        <a href="{{route('brands.index')}}">
            <span class="icon"><i class="fa fa-bold"></i></span>
            <span class="text">Brands</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['region.view']))
    <li>
        <a href="{{route('regions.index')}}">
            <span class="icon"><i class="fa fa-globe"></i></span>
            <span class="text">Regions</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['supplier.view']))
    <li>
        <a href="{{route('suppliers.index')}}">
            <span class="icon"><i class="fa fa-user"></i></span>
            <span class="text">Suppliers</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['warehouse.view']))
    <li>
        <a href="{{route('warehouses.index')}}">
            <span class="icon"><i class="fa fa-home"></i></span>
            <span class="text">Warehouses</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['stall.view']))
    <li>
        <a href="{{route('stalls.index')}}">
            <span class="icon"><i class="fa fa-home"></i></span>
            <span class="text">Stalls</span>
        </a>
    </li>
    @endif

    <li class="sidebar-category">
        <span>Warehouse</span>
        <span class="pull-right"><i class="fa fa-magic"></i></span>
    </li>

    @if(Sentinel::hasAnyAccess(['warehouse.po.view']))
    <li>
        <a href="{{route('warehouse.po.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Purchase Orders</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['warehouse.gr.view']))
    <li>
        <a href="{{route('warehouse.gr.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Goods Receives</span>
        </a>
    </li>
    @endif

    <li class="sidebar-category">
        <span>Stall</span>
        <span class="pull-right"><i class="fa fa-magic"></i></span>
    </li>

    @if(Sentinel::hasAnyAccess(['stall.po.view']))
    <li>
        <a href="{{route('stalls.po.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Purchase Orders</span>
        </a>
    </li>
    @endif

    @if(Sentinel::hasAnyAccess(['stall.gr.view']))
    <li>
        <a href="{{route('stalls.gr.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Goods Receives</span>
        </a>
    </li>
    @endif
</ul><!-- /.sidebar-menu -->
<div class="sidebar-footer hidden-xs hidden-sm hidden-md">
    <a class="pull-left" href="javascript:;" data-toggle="tooltip" data-placement="top" data-title="Setting"><i
            class="fa fa-cog"></i></a>
    <a id="fullscreen" class="pull-left" href="#" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i
            class="fa fa-desktop"></i></a>
    <a class="pull-left" href="javascript:;" data-toggle="tooltip" data-placement="top"
       data-title="Lock Screen"><i class="fa fa-lock"></i></a>
    <a class="pull-left" href="{{url('logout')}}" data-toggle="tooltip" data-placement="top" data-title="Logout"><i
            class="fa fa-power-off"></i></a>
</div><!-- /.sidebar-footer -->
