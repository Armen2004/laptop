<div id="dashboard_profile" class="col-md-2" ng-controller="MenuController">
    <div class="row">
        <span class="col-xs-12 text-right logout-button">
            <i class="fa fa-power-off fa-2x icon_off" aria-hidden="true" ng-controller="AuthController" ng-click="user_logout()"></i>
        </span>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center no-padding">
            <div class="">
                <img ng-src="<% S3_URL + userInfo.image %>" alt="Profile Logo" class="img-circle" width="100px" height="100px" ng-show="userInfo.image">
                <img ng-src="<% S3_URL + 'default/716492ddb6ee9a3fdc9cdf94b1ff7c70ce9d016c.jpg' %>" alt="Default Profile Logo" class="img-circle" width="100px" height="100px" ng-show="!userInfo.image">
                <img ng-src="{{ asset('images/green.png') }}" alt="Online Logo" class="green-img-circle">
                {{--<img ng-src="{{ asset('images/gray.png') }}" alt="Offline Logo" class="green-img-circle">--}}
            </div>
            <p class="text-center dashboard_profile_edit" ng-click="change_image()">Edit image</p>
            <div class="name-text">
                <h2><% userInfo.name %></h2>
                <h4 class="text-blue" ng-if="userInfo.user_type_id==1">FREE MEMBER</h4>
                <h4 class="text-pink" ng-if="userInfo.user_type_id>1">PREMIUM MEMBER</h4>
                <p>Joined: <% userInfo.created_at | toDate %></p>
            </div>

            <div class="dashboard_menu">
                <ul class="nav nav-pills nav-stacked nav_menu">
                    <li ng-class="{'active': isActive('/dashboard')}"><a ng-href="#/dashboard" class="text-uppercase">DASHBOARD</a></li>
                    <li ng-class="{'active': isActive('/my-lessons')}"><a ng-href="#/dashboard" class="text-uppercase">MY ACCOUNT</a></li>
                    <li ng-class="{'active': isActive('/forums')}"><a ng-href="#/dashboard" class="text-uppercase">MY FORUM ACTIVITY</a></li>
                    <li ng-class="{'active': isActive('/my-lessons')}"><a ng-href="#/dashboard" class="text-uppercase">MY LESSONS</a></li>
                </ul>
            </div>

            <div class="col-xs-12 no-padding" ng-if="userInfo.user_type_id==1 && trial" ng-controller="MenuController">
                <div class="counter">
                    <div class="col-xs-12 text-center counter-title">
                        <h2 class="text-uppercase">YOUR FREE MEMBERSHIP PLAN EXPIRES IN </h2>
                    </div>
                    <div id="countdown"></div><!-- /#Countdown Div -->
                    <div class="col-xs-12 ">
                        <button class="btn">UPGRADE FOR $1</button>
                    </div>
                </div> <!-- /.Counter Div -->
            </div> <!-- /.Columns Div -->
        </div>
    </div>
</div>