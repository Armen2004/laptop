<header>
    <div class="row">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header navbar-height">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" ng-href="#/dashboard" ng-if="userInfo.user_type_id==1">
                        <img ng-src="{{ asset('images/logofree.png') }}" alt="Top Logo Free">
                    </a>
                    <a class="navbar-brand" ng-href="#/dashboard" ng-if="userInfo.user_type_id>1">
                        <img ng-src="{{ asset('images/logopremium.png') }}" alt="Top Logo Premium">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a ng-href="javascript:void(0)" class="text-uppercase">LESSONS</a></li>
                        {{--<li><a ng-href="javascript:void(0)" class="text-uppercase">PRODUCTS</a></li>--}}
                        <li class="dropdown">
                            <a class="dropdown-toggle text-uppercase" type="button" data-toggle="dropdown">
                                PRODUCTS <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu row product-drop">
                                <li>
                                    <a ng-href="javascript:void(0)" class="text-uppercase col-xs-12 no-padding">
                                        <img ng-src="{{ asset('images/60.png') }}" alt="60 Days Logo" class="col-xs-4 img-responsive">
                                        <p class="col-xs-8 no-padding text-left">60 DAY CHALLANGE</p>
                                    </a>
                                </li>
                                <li>
                                    <a ng-href="javascript:void(0)" class="text-uppercase col-xs-12 no-padding">
                                        <img ng-src="{{ asset('images/logopremium.png') }}" alt="Laptop Premium Logo" class="col-xs-4 img-responsive">
                                        <p class="col-xs-8 no-padding text-left">LAPTOP STARTUP PREMIUM</p>
                                    </a>
                                </li>
                                <li>
                                    <a ng-href="javascript:void(0)" class="text-uppercase col-xs-12 no-padding">
                                        <img ng-src="{{ asset('images/buddy.png') }}" alt="Buddy Logo" class="col-xs-4 img-responsive">
                                        <p class="col-xs-8 no-padding text-left">PAGE BUDDY</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a ng-href="javascript:void(0)" class="text-uppercase">BLOG</a></li>
                        <li><a ng-href="javascript:void(0)" class="text-uppercase">FORUM</a></li>
                        <li><a ng-href="javascript:void(0)" class="text-uppercase">My Account</a></li>

                        <li class="dropdown">
                            <a class="dropdown-toggle text-uppercase" type="button" data-toggle="dropdown">
                                <i class="fa fa-bell icon_bell " aria-hidden="true">
                                    <div class="red-circle">2</div>
                                </i>
                            </a>
                            <div class="dropdown-menu notification col-xs-12 notification-center">
                                <span class="glyphicon glyphicon-triangle-top notification-arrow notification-arrow-center" aria-hidden="true"></span>
                                <h3 class="text-center notification-block ">Notification</h3>
                                <div class="notification-first-block notification-block col-xs-12">
                                    <div class="col-xs-3 notification-img no-padding">
                                        <img ng-src="{{ asset('images/profile-sm.png') }}" alt="Profile Logo" class="img-circle" width="100px" height="100px">
                                        <img ng-src="{{ asset('images/green.png') }}" alt="Online Logo" class="green-img-circle">
                                    </div>
                                    <div class="col-xs-9 no-padding">
                                        <p class="pull-right notification-date">2 days ago</p>
                                        <p><span>Sam Baker</span> replied to your post </p>
                                        <p><span>"Hi from Scotland - Brrrr!"</span></p>
                                        <p>Hey welcome it's great to have you here :)...</p>
                                    </div>
                                </div>

                                <div class="notification-first-block notification-block col-xs-12">
                                    <div class="col-xs-3 notification-img ">
                                        <img ng-src="{{ asset('images/logofree.png') }}" alt="Logo Free" class="notification-logo">
                                    </div>
                                    <div class="col-xs-9 no-padding">
                                        <p class="pull-right notification-date">3 days ago</p>
                                        <p><span>New update into your account: </span></p>
                                        <p>
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                            ut labore et dolore magna aliqua.
                                        </p>
                                        <a ng-href="javascript:void(0)">See Details</a>
                                    </div>
                                </div>

                                <div class="notification-first-block notification-block col-xs-12">
                                    <div class="col-xs-3 notification-img">
                                        <img ng-src="{{ asset('images/logofree.png') }}" alt="Logo Free" class="notification-logo">
                                    </div>
                                    <div class="col-xs-9 no-padding">
                                        <p class="pull-right notification-date">4 days ago</p>
                                        <p><span>Your card is expired. </span></p>
                                        <p>Please update your billing method. </p>
                                        <a ng-href="javascript:void(0)">See Details</a>
                                    </div>
                                </div>

                                <div class="notification-first-block notification-block col-xs-12">
                                    <div class="text-center notification-img">
                                        <a ng-href="javascript:void(0)">See all</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li>
                            <a ng-href="javascript:void(0)">
                                <i class="fa fa-question-circle icon_question" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="header-name header-hide-click">Sam Baker</li>
                        <li class="no-padding header-hide-click">
                            <img ng-src="{{ asset('images/profile-sm.png') }}" alt="Profile Logo" class="header-img" id="menu-click">
                        </li>
                        <li class="header-hide-click">
                            <span class="col-md-12 text-right header-icon">
                                <i class="fa fa-power-off icon_off" aria-hidden="true"></i>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
