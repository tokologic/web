<div class="header-left">
    <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only
#header have the `position: relative`, or it may cause unwanted behavior -->
    <div class="navbar-minimize-mobile left">
        <i class="fa fa-bars"></i>
    </div>
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('cashier.dashboard') }}">
            {{--<img class="logo" src="{{asset('img/blank-avatar.jpeg')}}" alt="brand logo"/>--}}
            <span>Kasir Sehati</span>
        </a>
    </div>
    <!-- Start offcanvas right: This menu will take position at the top of template header (mobile only). Make sure that only
#header have the `position: relative`, or it may cause unwanted behavior -->
    <div class="navbar-minimize-mobile right">
        <i class="fa fa-cog"></i>
    </div>

    <div class="clearfix"></div>
</div>
<div class="header-right">
    <div class="navbar navbar-toolbar">
        <ul class="nav navbar-nav navbar-left">
            <li class="navbar-minimize">
                <a href="javascript:void(0);" title="Minimize sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown navbar-profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="meta">
                        <span class="avatar">
                            <img src="{{asset('img/blank-avatar.jpeg')}}" class="img-circle"
                                 alt="admin">
                        </span>
                        {{--@if(Sentinel::check())--}}
                            {{--<span class="text hidden-xs hidden-sm text-muted">{{ Sentinel::getUser()->first_name .' '. Sentinel::getUser()->last_name }}</span>--}}
                        {{--@endif--}}
                        <span class="caret"></span>
                    </span>
                </a>

                <ul class="dropdown-menu animated bounceInDown">
                    <li class="dropdown-header">Account</li>
                    <li><a href="page-profile.html"><i class="fa fa-user"></i>View profile</a></li>
                    <li><a href="mail-inbox.html"><i class="fa fa-envelope-square"></i>Inbox <span
                                    class="label label-info pull-right">30</span></a></li>
                    <li><a href="#"><i class="fa fa-share-square"></i>Invite a friend</a></li>
                    <li class="dropdown-header">Product</li>
                    <li><a href="#"><i class="fa fa-upload"></i>Upload</a></li>
                    <li><a href="#"><i class="fa fa-dollar"></i>Earning</a></li>
                    <li><a href="#"><i class="fa fa-download"></i>Withdrawals</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
