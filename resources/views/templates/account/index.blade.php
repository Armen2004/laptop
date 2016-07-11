<div class="wrapper">
    <!-------------- Header block start -------------->
    <header>
        <div class="container-fluid acc-page full-height-container">
            <div class="row">
                <div class="col-md-12 no-padd content-section">
                    <!--header start-->
                    <div class="col-md-12 no-padd">
                        <div class="col-md-4 header-part-1 clearfix">
                            <div class="block-container text-center">
                                <img src="/images/logo-s.png" alt="" class="img-responsive">
                                <span class="search-block">
                                    <input type="text" placeholder="Search">
                                </span>
                            </div>
                        </div>
                        <div class="col-md-5 header-part-2 clearfix">
                            <div class="col-md-4 col-sm-4 col-xs-4 text-block">
                                <p>your free</p>
                                <p>membership plan</p>
                                <p>expires in</p>
                            </div>
                            <div class="col-md-8 col-sm-8 timer-block no-padd">
                                <ul class="timer clearfix">
                                    <li>
                                        <span>06</span>
                                        <p>DAYS</p>
                                    </li>
                                    <li>
                                        <span>04</span>
                                        <p>HOURS</p>
                                    </li>
                                    <li>
                                        <span>34</span>
                                        <p>Minutes</p>
                                    </li>
                                </ul>
                                <div class="button-block">
                                    <button class="upgrade-btn">
                                        upgrade for 1$
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 header-part-3 user-account-details user-area text-center">
                            <span class="user-name"><% userInfo.name %> </span>
                            <img src="<% S3_URL + userInfo.image %>" alt="<% userInfo.name %>">
                            <i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()" ng-controller="AuthController"></i>
                            <span class="open-menu">
                                <img src="/images/icons/open-menu.png" alt="">
                            </span>
                        </div>
                    </div>
                    <!--header END-->
                    <div class="col-md-8 col-md-offset-2 header-part-2 home-p clearfix">
                        <ul class="web-header">
                            <li>
                                <a ng-href="#/">
                                    Questions?
                                </a>
                            </li>
                            <li>
                                <a ng-href="#/">
                                    0800-448938
                                </a>
                            </li>
                            <li>
                                <a ng-href="#/">
                                    Support
                                </a>
                            </li>
                            <li>
                                <a ng-href="#/">
                                    Favorites
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 demo acc-page-content" id="sliphover">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padd same-height">
                            <a ng-href="#/">
                                <img src="/images/Vector-Smart-Object11.png" alt="" class="img-responsive" title="">
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padd same-height">
                            <a ng-href="#/">
                                <img src="/images/Easy-Drag-&-Drop--Online-Pages-builder.png" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padd same-height">
                            <a ng-href="#/">
                                <img src="/images/Layer-13.png" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padd same-height">
                            <a ng-href="#/">
                                <img src="/images/Buy-and-Sell-products-here.png" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-6 no-padd big-same-height">
                            <a ng-href="#/">
                                <img src="/images/For-anyone-who-wants-to-set-up-a-website--to-make-extra-income.png" alt="" class="img-responsive">
                            </a>
                        </div>
                        <div class="col-md-6 no-padd big-same-height">
                            <a ng-href="#/">
                                <img src="/images/Sam-Baker-copy-2.png" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
                @if(auth()->guard('user')->user()->user_type_id > 1)
                    @include('templates.partials.paid-menu')
                @else
                    @include('templates.partials.free-menu')
                @endif
            </div>
        </div>
    </header>
    <!-------------- Header block end -------------->
</div>