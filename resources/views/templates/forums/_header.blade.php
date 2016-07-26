<!---Header start--->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 header-part-1 clearfix">
                <div class="block-container pull-right-block">
                    <img ng-src="{{ asset('images/logo-s.png') }}" alt="Logo Laptop Start Up" class="img-responsive">
                        <span class="search-block">
                         <input type="text" placeholder="Search">
                        </span>
                </div>
            </div>
            <div class="col-md-5 header-part-2 blog-p clearfix">
                <ul class="web-header">
                    <li><a ng-href="javascript:void(0)">Questions?</a></li>
                    <li><a ng-href="javascript:void(0)">0800-448938</a></li>
                    <li><a ng-href="javascript:void(0)">Support</a></li>
                    <li><a ng-href="javascript:void(0)">Favorites</a></li>
                </ul>
            </div>
            <div class="col-md-3 header-part-3 text-right">
                <span><% userInfo.name %></span>
                <img ng-src="<% S3_URL + userInfo.image %>" alt="<% userInfo.name %>">
                <i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()" ng-controller="AuthController"></i>
            </div>
        </div>
    </div>
</header>
<!---Header END--->