<div class="sidebar-content">
    <div class="media">
        <a class="pull-left has-notif avatar" href="page-profile.html">
            <img src="{{asset('img/blank-avatar.jpeg')}}" alt="admin">
            <i class="online"></i>
        </a>
        <div class="media-body">
            @if(Sentinel::check())
                <h4 class="media-heading">Halo, <span>{{ Sentinel::getUser()->first_name }}</span></h4>
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

    @if(Sentinel::hasAnyAccess(['user.view','midwife.view','warehouser.view']))

        <li class="submenu">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Users</span>
                <span class="arrow"></span>
            </a>
            <ul>
                @if(Sentinel::hasAnyAccess(['user.view']))
                    <li>
                        <a href="{{route('users.index')}}">Pengguna</a>
                    </li>
                @endif

                @if(Sentinel::hasAnyAccess(['midwife.view']))
                    <li>
                        <a href="{{route('midwives.index')}}">Bidan</a>
                    </li>
                @endif

                @if(Sentinel::hasAnyAccess(['warehouser.view']))
                    <li>
                        <a href="{{route('warehousers.index')}}">Penjaga gudang</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if(Sentinel::hasAnyAccess(['category.view','brand.view']))
        <li class="submenu">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-tags"></i></span>
                <span class="text">Brand & Produk</span>
                <span class="arrow"></span>
            </a>
            <ul>
                @if(Sentinel::hasAnyAccess(['category.view']))
                    <li>
                        <a href="{{route('categories.index')}}">Kategori</a>
                    </li>
                @endif

                @if(Sentinel::hasAnyAccess(['brand.view']))
                    <li>
                        <a href="{{route('brands.index')}}">Brand</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif


    @if(Sentinel::hasAnyAccess(['region.view']))
        <li>
            <a href="{{route('regions.index')}}">
                <span class="icon"><i class="fa fa-globe"></i></span>
                <span class="text">Wilayah</span>
            </a>
        </li>
    @endif

    @if(Sentinel::hasAnyAccess(['supplier.view']))
        <li>
            <a href="{{route('suppliers.index')}}">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">Supplier</span>
            </a>
        </li>
    @endif

    @if(Sentinel::hasAnyAccess(['warehouse.view']))
        <li>
            <a href="{{route('warehouses.index')}}">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Gudang</span>
            </a>
        </li>
    @endif

    @if(Sentinel::hasAnyAccess(['stall.view']))
        <li>
            <a href="{{route('stalls.index')}}">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="text">Kios</span>
            </a>
        </li>
    @endif

    @if(Sentinel::hasAnyAccess(['warehouse.po.view','warehouse.gr.view']))

        <li class="sidebar-category">
            <span>Gudang</span>
            <span class="pull-right"><i class="fa fa-magic"></i></span>
        </li>

        @if(Sentinel::hasAnyAccess(['warehouse.po.view']))
            <li>
                <a href="{{route('warehouse.po.index')}}">
                    <span class="icon"><i class="fa fa-leaf"></i></span>
                    <span class="text">PO (Pemesanan)</span>
                </a>
            </li>
        @endif

        @if(Sentinel::hasAnyAccess(['warehouse.gr.view']))
            <li>
                <a href="{{route('warehouse.gr.index')}}">
                    <span class="icon"><i class="fa fa-leaf"></i></span>
                    <span class="text">GR (Penerimaan)</span>
                </a>
            </li>
        @endif
    @endif

    @if(Sentinel::hasAnyAccess(['stall.po.view','stall.gr.view']))

        <li class="sidebar-category">
            <span>Kios</span>
            <span class="pull-right"><i class="fa fa-magic"></i></span>
        </li>

        @if(Sentinel::hasAnyAccess(['stall.po.view']))
            <li>
                <a href="{{route('stalls.po.index')}}">
                    <span class="icon"><i class="fa fa-leaf"></i></span>
                    <span class="text">PO (Pemesanan)</span>
                </a>
            </li>
        @endif

        @if(Sentinel::hasAnyAccess(['stall.gr.view']))
            <li>
                <a href="{{route('stalls.gr.index')}}">
                    <span class="icon"><i class="fa fa-leaf"></i></span>
                    <span class="text">GR (Penerimaan)</span>
                </a>
            </li>
        @endif
    @endif

    @if(Sentinel::hasAnyAccess(['sales.view','sales.create']))
        <li class="submenu">
            <a href="javascript:void(0);">
                <span class="icon"><i class="fa fa-exchange"></i></span>
                <span class="text">Transaksi</span>
                <span class="arrow"></span>
            </a>
            <ul>
                <li>
                    <a href="{{route('sales.index')}}">Transaksi Toko</a>
                </li>

                <li>
                    <a href="{{route('sales.previous')}}">Riwayat Transaksi</a>
                </li>
            </ul>
        </li>
    @endif

    {{-- <li>
         <a href="{{route('stallitem.index')}}">
             <span class="icon"><i class="fa fa-leaf"></i></span>
             <span class="text">Stall Item</span>
         </a>
     </li>--}}
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
