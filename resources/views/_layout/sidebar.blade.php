<div class="sidebar-content">
    <div class="media">
        <a class="pull-left has-notif avatar" href="page-profile.html">
            <img src="{{asset('img/blank-avatar.jpeg')}}" alt="admin">
            <i class="online"></i>
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{ __('Hello') }}, <span>{{ Sentinel::getUser()->first_name }}</span></h4>
            <small>d</small>
        </div>
    </div>
</div><!-- /.sidebar-content -->
<ul class="sidebar-menu">
    <li>
        <a href="{{route('users.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Users</span>
        </a>
    </li>
    <li>
        <a href="{{route('midwives.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Midwives</span>
        </a>
    </li>
    <li>
        <a href="{{route('categories.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Categories</span>
        </a>
    </li>
    <li>
        <a href="{{route('brands.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Brands</span>
        </a>
    </li>
    <li>
        <a href="{{route('regions.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">Regions</span>
        </a>
    </li>
    <li class="sidebar-category">
        <span>Purchase Orders</span>
        <span class="pull-right"><i class="fa fa-magic"></i></span>
    </li>
    <li>
        <a href="{{route('warehouse.po.index')}}">
            <span class="icon"><i class="fa fa-leaf"></i></span>
            <span class="text">PO</span>
        </a>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-file-o"></i></span>
            <span class="text">Pages</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li><a href="page-calendar.html">Calendar</a></li>
            <li><a href="page-invoice.html">Invoice</a></li>
            <li><a href="page-messages.html">Messages</a></li>
            <li><a href="page-timeline.html">Timeline</a></li>
            <li><a href="page-profile.html">Profile</a></li>
            <li class="submenu">
                <a href="javascript:void(0);">Blog<span class="arrow"></span></a>
                <ul>
                    <li><a href="page-blog-list.html">List</a></li>
                    <li><a href="page-blog-single.html">Single</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);">Error <span class="arrow"></span></a>
                <ul>
                    <li><a href="page-error-403.html">Error 403</a></li>
                    <li><a href="page-error-404.html">Error 404</a></li>
                    <li><a href="page-error-500.html">Error 500</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);">Account <span class="arrow"></span></a>
                <ul>
                    <li><a href="page-signin.html">Sign In</a></li>
                    <li><a href="page-signup.html">Sign Up</a></li>
                    <li><a href="page-lost-password.html">Lost password</a></li>
                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-list-alt"></i></span>
            <span class="text">Forms</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li><a href="form-element.html">Element</a></li>
            <li><a href="form-advanced.html">Advanced</a></li>
            <li><a href="form-layout.html">Layout</a></li>
            <li><a href="form-validation.html">Validation</a></li>
            <li><a href="form-wizard.html">Wizard</a></li>
            <li><a href="form-wysiwyg.html">Text Editor</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-table"></i></span>
            <span class="text">Tables</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li><a href="table-default.html">Default</a></li>
            <li><a href="table-color.html">Color</a></li>
            <li><a href="table-datatable.html">Datatable</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-envelope"></i></span>
            <span class="text">Mail</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li><a href="mail-inbox.html">Inbox</a></li>
            <li><a href="mail-compose.html">Compose mail</a></li>
            <li><a href="mail-view.html">View mail</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-map-marker"></i></span>
            <span class="text">Maps</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li><a href="maps-google.html">Google</a></li>
            <li><a href="maps-vector.html">Vector</a></li>
        </ul>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-signal"></i></span>
            <span class="text">Charts</span>
            <span class="arrow"></span>
        </a>
        <ul>
            <li><a href="chart-flot.html">Flot</a></li>
            <li><a href="chart-morris.html">Morris</a></li>
            <li><a href="chart-chartjs.html">Chartjs</a></li>
            <li><a href="chart-c3js.html">C3js</a></li>
        </ul>
    </li>
    <li class="sidebar-category">
        <span>DEVELOP</span>
        <span class="pull-right"><i class="fa fa-code"></i></span>
    </li>
    <li class="submenu">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-cube"></i></span>
            <span class="text">Components</span>
            <span class="plus"></span>
        </a>
        <ul>
            <li><a href="component-grid-system.html">Grid System</a></li>
            <li><a href="component-buttons.html">Buttons</a></li>
            <li><a href="component-typography.html">Typography</a></li>
            <li><a href="component-panel.html">Panels</a></li>
            <li><a href="component-alerts.html">Alerts</a></li>
            <li><a href="component-modals.html">Modals</a></li>
            <li><a href="component-tabsaccordion.html">Tabs & Accordion</a></li>
            <li><a href="component-sliders.html">Sliders</a></li>
            <li class="submenu">
                <a href="javascript:void(0);">
                    <span class="text">Icons</span>
                    <span class="count label label-danger">4</span>
                    <span class="arrow"></span>
                </a>
                <ul>
                    <li><a href="component-glyphicons.html">Glyphicons</a></li>
                    <li><a href="component-font-awesome.html">Font Awesome</a></li>
                    <li><a href="component-weather-icons.html">Weather Icons</a></li>
                    <li><a href="component-map-icons.html">Map Icons</a></li>
                </ul>
            </li>
            <li><a href="component-other.html">Other</a></li>
        </ul>
    </li>
    <li class="submenu active">
        <a href="javascript:void(0);">
            <span class="icon"><i class="fa fa-columns"></i></span>
            <span class="text">Layouts</span>
            <span class="plus"></span>
            <span class="selected"></span>
        </a>
        <ul>
            <li class="active"><a href="layout-blank.html">Blank Page</a></li>
            <li><a href="layout-boxed.html">Boxed Page</a></li>
            <li><a href="layout-header-fixed.html">Header Fixed Page</a></li>
            <li><a href="layout-sidebar-fixed.html">Sidebar Fixed Page</a></li>
            <li><a href="layout-sidebar-minimize.html">Sidebar Minimize Page</a></li>
            <li><a href="layout-sidebar-default.html">Sidebar Default Page</a></li>
            <li><a href="layout-sidebar-box.html">Sidebar Box Page</a></li>
            <li><a href="layout-sidebar-rounded.html">Sidebar Rounded Page</a></li>
            <li><a href="layout-sidebar-circle.html">Sidebar Circle Page</a></li>
            <li><a href="layout-footer-fixed.html">Footer Fixed Page</a></li>
        </ul>
    </li>
    <li class="sidebar-category">
        <span>WIDGET</span>
        <span class="pull-right"><i class="fa fa-cubes"></i></span>
    </li>
    <li>
        <a href="widget-overview.html">
            <span class="icon"><i class="fa fa-desktop"></i></span>
            <span class="text">Overview</span>
            <span class="label label-primary pull-right rounded">10</span>
        </a>
    </li>
    <li>
        <a href="widget-social.html">
            <span class="icon"><i class="fa fa-group"></i></span>
            <span class="text">Social</span>
            <span class="label label-success pull-right rounded">28</span>
        </a>
    </li>
    <li>
        <a href="widget-blog.html">
            <span class="icon"><i class="fa fa-pencil"></i></span>
            <span class="text">Blog</span>
            <span class="label label-info pull-right rounded">15</span>
        </a>
    </li>
    <li>
        <a href="widget-weather.html">
            <span class="icon"><i class="fa fa-sun-o"></i></span>
            <span class="text">Weather</span>
            <span class="label label-warning pull-right rounded">6</span>
        </a>
    </li>
    <li>
        <a href="widget-misc.html">
            <span class="icon"><i class="fa fa-puzzle-piece"></i></span>
            <span class="text">Misc</span>
            <span class="label label-danger pull-right rounded">9</span>
        </a>
    </li>
    <li class="sidebar-category hidden-sidebar-minimize">
        <span>BLANKON CORE</span>
        <span class="pull-right"><i class="fa fa-coffee"></i></span>
    </li>
    <li class="hidden-sidebar-minimize">
        <a href="blankon-versions.html">
            <span class="icon"><i class="fa fa-dropbox"></i></span>
            <span class="text">Blankon Versions</span>
        </a>
    </li>
    <li class="hidden-sidebar-minimize">
        <a href="../../../documentation/production-documentation.html" target="_blank">
            <span class="icon"><i class="fa fa-book"></i></span>
            <span class="text">API Documentation</span>
        </a>
    </li>
</ul><!-- /.sidebar-menu -->
<div class="sidebar-footer hidden-xs hidden-sm hidden-md">
    <a class="pull-left" href="#" data-toggle="tooltip" data-placement="top" data-title="Setting"><i class="fa fa-cog"></i></a>
    <a id="fullscreen" class="pull-left" href="#" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
    <a class="pull-left" href="page-lock-screen.html" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
    <a class="pull-left" href="page-signin.html" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
</div><!-- /.sidebar-footer -->
