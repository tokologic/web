<div class="header-left">
    <!-- Start offcanvas left: This menu will take position at the top of template header (mobile only). Make sure that only
#header have the `position: relative`, or it may cause unwanted behavior -->
    <div class="navbar-minimize-mobile left">
        <i class="fa fa-bars"></i>
    </div>
    <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.html">
            {{--<img class="logo" src="{{asset('img/blank-avatar.jpeg')}}" alt="brand logo"/>--}}
            <span>Kios Sehati</span>
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
            {{--<li class="navbar-search">
                <a href="#" class="trigger-search"><i class="fa fa-search"></i></a>
                <form class="navbar-form">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control typeahead rounded"
                               placeholder="Search for people, places and things">
                        <button type="submit" class="btn btn-theme fa fa-search form-control-feedback rounded"></button>
                    </div>
                </form>
            </li>--}}

        </ul>
        <ul class="nav navbar-nav navbar-right">
            {{--<li class="dropdown navbar-message">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="rounded count label label-danger">7</span>
                </a>
                <div class="dropdown-menu animated bounceInDown">
                    <div class="dropdown-header">
                        <span class="title">Messages <strong>(7)</strong></span>
                        <span class="option text-right"><a href="#">+ New message</a></span>
                    </div>
                    <div class="dropdown-body">

                        <!-- Start message search -->
                        <form class="form-horizontal" action="#">
                            <div class="form-group has-feedback has-feedback-sm m-5">
                                <input type="text" class="form-control input-sm" placeholder="Search message...">
                                <button type="submit" class="btn btn-theme fa fa-search form-control-feedback"></button>
                            </div>
                        </form>
                        <!--/ End message search -->

                        <!-- Start message list -->
                        <div class="media-list niceScroll">

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/2.png"
                                                            class="media-object img-circle" alt="John Kribo"/></div>
                                <div class="media-body">
                                    <span class="media-heading">John Kribo</span>
                                    <span class="media-text">I was impressed how fast the content is loaded. Congratulations. nice design.</span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta"><i class="fa fa-reply"></i></span>
                                    <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                                    <span class="media-meta pull-right">13 minutes</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/3.png"
                                                            class="media-object img-circle" alt="Jennifer Poiyem"/>
                                </div>
                                <div class="media-body">
                                    <span class="media-heading">Jennifer Poiyem</span>
                                    <span class="media-text">It’s Simple, Clean & Nice .. Good work Dear .. GLWS</span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta pull-right">17 hours</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/4.png"
                                                            class="media-object img-circle" alt="Clara Wati"/></div>
                                <div class="media-body">
                                    <span class="media-heading">Clara Wati</span>
                                    <span class="media-text">
                            Great work! Do you have any plans to add loading indicators for AJAX calls that might take longer than normal?
                        </span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta pull-right">1 days</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/5.png"
                                                            class="media-object img-circle" alt="Toni Mriang"/></div>
                                <div class="media-body">
                                    <span class="media-heading">Toni Mriang</span>
                                    <span class="media-text">I am very interested in the theme and I’m thinking about buying it.</span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                                    <span class="media-meta pull-right">2 days</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/6.png"
                                                            class="media-object img-circle" alt="Bella negoro"/></div>
                                <div class="media-body">
                                    <span class="media-heading">Bella negoro</span>
                                    <span class="media-text">Great work! Good luck!</span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                                    <span class="media-meta"><i class="fa fa-user"></i></span>
                                    <span class="media-meta pull-right">1 week</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/7.png"
                                                            class="media-object img-circle" alt="Kim Mbako"/></div>
                                <div class="media-body">
                                    <span class="media-heading">Kim Mbako</span>
                                    <span class="media-text">
                            Hi! First of all, thank you for the very nice theme for creating awesome web applications :)
                        </span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta"><i class="fa fa-paperclip"></i></span>
                                    <span class="media-meta pull-right">1 week</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="page-messages.html" class="media">
                                <div class="pull-left"><img src="../../../assets/global/img/avatar/50/8.png"
                                                            class="media-object img-circle" alt="Pack Suparman"/></div>
                                <div class="media-body">
                                    <span class="media-heading">Pack Suparman</span>
                                    <span class="media-text">Apik temen kie jan template, nyong gep tuku jal..</span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta pull-right">1 week</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <!-- Start message indicator -->
                            <a href="#" class="media indicator inline">
                                <span class="spinner">Load more messages...</span>
                            </a>
                            <!--/ End message indicator -->

                        </div>
                        <!--/ End message list -->

                    </div>
                    <div class="dropdown-footer">
                        <a href="page-messages.html">See All</a>
                    </div>
                </div>
            </li>
            <li class="dropdown navbar-notification">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="rounded count label label-danger">6</span>
                </a>

                <div class="dropdown-menu animated bounceInDown">
                    <div class="dropdown-header">
                        <span class="title">Notifications <strong>(10)</strong></span>
                        <span class="option text-right"><a href="#"><i class="fa fa-cog"></i> Setting</a></span>
                    </div>
                    <div class="dropdown-body niceScroll">

                        <div class="media-list small">

                            <a href="#" class="media">
                                <div class="media-object pull-left"><i class="fa fa-share-alt fg-info"></i></div>
                                <div class="media-body">
                        <span class="media-text">
                            <strong>Dolanan Remi : </strong>
                            <strong>Chris Job,</strong>
                            <strong>Denny Puk</strong> and
                            <strong>Joko Fernandes</strong> sent you
                            <strong>5 free energy boosts and other request</strong>
                        </span>
                                    <span class="media-meta">3 minutes</span>
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="#" class="media">
                                <div class="media-object pull-left"><i class="fa fa-cogs fg-success"></i></div>
                                <div class="media-body">
                                    <span class="media-text">Your sistem is updated</span>
                                    <span class="media-meta">5 minutes</span>
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="#" class="media">
                                <div class="media-object pull-left"><i class="fa fa-ban fg-danger"></i></div>
                                <div class="media-body">
                                    <span class="media-text">3 Member is BANNED</span>
                                    <span class="media-meta">5 minutes</span>
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="#" class="media">
                                <div class="media-object pull-left"><img class="img-circle"
                                                                         src="../../../assets/global/img/avatar/50/10.png"
                                                                         alt=""/></div>
                                <div class="media-body">
                                    <span class="media-text">daddy pushed to project Blankon version 1.0.0</span>
                                    <span class="media-meta">45 minutes</span>
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="#" class="media">
                                <div class="media-object pull-left"><i class="fa fa-user fg-info"></i></div>
                                <div class="media-body">
                                    <span class="media-text">Change your user profile</span>
                                    <!-- Start meta icon -->
                                    <span class="media-meta">1 days</span>
                                    <!--/ End meta icon -->
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="#" class="media">
                                <div class="media-object pull-left"><i class="fa fa-book fg-info"></i></div>
                                <div class="media-body">
                                    <span class="media-text">Added new article</span>
                                    <span class="media-meta">1 days</span>
                                </div><!-- /.media-body -->
                            </a><!-- /.media -->

                            <a href="#" class="media indicator inline">
                                <span class="spinner">Load more notifications...</span>
                            </a>

                        </div>

                    </div>
                    <div class="dropdown-footer">
                        <a href="#">See All</a>
                    </div>
                </div>

            </li>--}}
            <li class="dropdown navbar-profile">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="meta">
                        <span class="avatar">
                            <img src="{{asset('img/blank-avatar.jpeg')}}" class="img-circle"
                                 alt="admin">
                        </span>
                        <span class="text hidden-xs hidden-sm text-muted">Tol Lee</span>
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
