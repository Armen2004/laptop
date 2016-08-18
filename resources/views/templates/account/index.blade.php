<div class="container-fluid dashboard-container">

    <!-- NAVBAR START -->
        @include('templates.partials._nav')
    <!-- NAVBAR END -->

    <div class="row">

        <!--CONTENT START-->
        <div class="col-md-9 content">
            <section class="row">
                <div class="col-md-12 dashboard_content">
                    <h1> What do you want to do today ? </h1>
                    <div class="col-md-3 shadow dashboard_block_1 text-center">
                        <p class="dashboard_block_title">FREE LESSONS</p>
                        {{--<canvas class="loader"></canvas>--}}
                        <div class="progress progress-bar-dashboard">75% complete</div>
                        <round-progress max="100" current="75" color="#329BC3" bgcolor="#f1f1f1" radius="100" stroke="10" semi="false" rounded="true" clockwise="true" responsive="false" duration="800" animation="easeInOutQuart" animation-delay="0"></round-progress>
                        <div class="row">
                            <div class="dashboard_block_link col-xs-12"><a ng-href="javascript:void(0)">ASSES AGAIN</a></div>
                        </div>
                    </div>
                    <div class="col-md-3 shadow text-center dashboard-block-pink">
                        <div class="col-md-12" ng-if="userInfo.user_type_id==1">
                            <div class="col-md-12">
                                <img ng-src="{{ asset('images/logopremium.png') }}" alt="Logo Premium" class="img-responsive">
                            </div>
                            <p class="col-md-12 no-padding text-pink">
                                Easy Drag & Drop Pages in minutes You'll get immediate access to our communities
                                Site Builder. It includes pre-built templates from our community.
                            </p>
                        </div>
                        <div ng-if="userInfo.user_type_id>1">
                            <p class="dashboard_block_title text-center">PREMIUM TRAINING</p>
                            <div class="progress progress-bar-dashboard">27% complete</div>
                            <round-progress max="100" current="25" color="#E93E7B" bgcolor="#f1f1f1" radius="100" stroke="10" semi="false" rounded="true" clockwise="true" responsive="false" duration="800" animation="easeInOutQuart" animation-delay="0"></round-progress>
                        </div>

                        <div class="clearfix">&nbsp;</div>
                        <div class="row">
                            <div class="dashboard_block_link col-xs-12 text-center block-pink">
                                <a ng-href="javascript:void(0)">CONTINUE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 shadow dashboard-block-green text-center">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <img ng-src="{{ asset('images/60.png') }}" alt="Logo 60" class="img_60">
                            </div>
                            <p class="col-md-12 no-padding">
                                Easy Drag & Drop Pages in minutes You'll get immediate access to our communities Site
                                Builder. It includes pre-built templates from our community.
                            </p>
                        </div>
                        <div class="row">
                            <div class="dashboard_block_link block-green-link col-xs-12 no-padding">
                                <a ng-href="javascript:void(0)">LEARN MORE</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 shadow text-center">
                        <img ng-src="{{ asset('images/page_buddy.png') }}" alt="Logo Page Buddy" class="buddy_img">
                        <p>Last saved page: </p>
                        <img ng-src="{{ asset('images/lastpage.png') }}" alt="Logo Last Page" class="last_img">
                        <div class="row">
                            <div class="dashboard_block_link col-xs-12 text-center block-orange">
                                <a ng-href="javascript:void(0)">OPEN</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 no-padding">
                        <div class="col-md-6  dashboard-block-left dashboard_block_all">

                            <div class="col-xs-12 video_tag" ng-if="userInfo.user_type_id==1">
                                <video controls class="col-md-12 no-padding">
                                    <source ng-src="{{ asset('video/Paul.mp4') }}" type="video/mp4">
                                </video>
                                <div class="clearfix">&nbsp;</div>
                                <button class="col-md-18 btn video_button">DOWNLOAD ROADMAP</button>
                            </div>

                            <div ng-if="userInfo.user_type_id>1">
                                <div class="dashboard-text-first-title">
                                    <p class="block-text ">COMING AUGUST 16TH...</p>
                                </div>
                                <p class="block-text-title dashboard-block-left-text " id="title-local">
                                    Local Business Kickstarter
                                </p>
                                <div class="col-xs-12 dashboard-block-left-text border-none" id="first-block-img">
                                    <p class="img_text">by Sam Baker</p>
                                    <img ng-src="{{ asset('images/profile-sm.png') }}" alt="Profile Logo" class="img-circle" width="80px" height="80px">
                                </div>
                                <div class="col-xs-12 dashboard-block-left-text dashboard-block-left-text-double">
                                    <h5>LESSON 1:</h5>
                                    <h4>Introduction</h4>
                                    <p>
                                        For anyone who wants to set up a website to make extra income but doesn't make a
                                    </p>
                                </div>
                                <div class="col-xs-12 dashboard-block-left-text">
                                    <h5>LESSON 2:</h5>
                                    <h4>Brainstorming</h4>
                                    <p>
                                        For anyone who wants to set up a website to make extra income but doesn't make a
                                    </p>
                                </div>
                                <div class="col-xs-12">
                                    <div class="pull-right"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 dashboard-block-right dashboard_block_all">
                            <div class="dashboard-text-first-title">
                                <p class="block-text">FROM OUR COMMUNITY FORUM...</p>
                            </div>

                            <div class="dashboard-block-right-text">
                                <h6>NEWS & INFORMATION</h6>
                                <div class="col-xs-3 block-img-right text-center no-padding">
                                    <img ng-src="{{ asset('images/profile-sm.png') }}" alt="Profile Logo" class="img-circle" width="80px" height="80px">
                                </div>
                                <div class="col-xs-9 no-padding">
                                    <p class="col-xs-12 no-padding" style="padding:5px 0">
                                        <strong class="pull-left">Sam Baker</strong>
                                        <span class="pull-right block-right-date">08-02-2016 04:40 AM</span>
                                    </p>
                                    <p class="col-xs-10 no-padding text-justify">
                                        Hey guys, I'm in the process of writing up some rules and guid
                                        Hey guys, I'm in the process of writing up some rules and guid
                                        Hey guys, I'm in the process of writing up some rules and guid
                                        Hey guys, I'm in the process of writing up some rules and guid
                                    </p>
                                    <i class="fa fa-reply col-xs-2 fa-2x icon-replay fa-flip-horizontal text-center no-padding" aria-hidden="false"></i>
                                </div>
                            </div>
                            <div class="dashboard-block-right-text">
                                <h6>NEWS & INFORMATION</h6>
                                <div class="col-xs-3 block-img-right text-center no-padding">
                                    <img ng-src="{{ asset('images/profile-sm.png') }}" alt="Profile Logo" class="img-circle" width="80px" height="80px">
                                </div>
                                <div class="col-xs-9 no-padding">
                                    <p class="col-xs-12 no-padding" style="padding:5px 0">
                                        <strong class="pull-left">Sam Baker</strong>
                                        <span class="pull-right block-right-date">08-02-2016 04:40 AM</span>
                                    </p>
                                    <p class="col-xs-10 no-padding text-justify">
                                        Hey guys, I'm in the process of writing up some rules and guid
                                        Hey guys, I'm in the process of writing up some rules and guid
                                        Hey guys, I'm in the process of writing up some rules and guid
                                    </p>
                                    <i class="fa fa-reply col-xs-2 fa-2x icon-replay fa-flip-horizontal text-center no-padding" aria-hidden="false"></i>
                                </div>
                            </div>
                            <div class="dashboard-block-right-text">
                                <h6>NEWS & INFORMATION</h6>
                                <div class="col-xs-3 block-img-right text-center no-padding">
                                    <img ng-src="{{ asset('images/profile-sm.png') }}" alt="Profile Logo" class="img-circle" width="80px" height="80px">
                                </div>
                                <div class="col-xs-9 no-padding">
                                    <p class="col-xs-12 no-padding" style="padding:5px 0">
                                        <strong class="pull-left">Sam Baker</strong>
                                        <span class="pull-right block-right-date">08-02-2016 04:40 AM</span>
                                    </p>
                                    <p class="col-xs-10 no-padding text-justify">
                                        Hey guys, I'm in the process of writing up some rules and guid
                                        Hey guys, I'm in the process of writing up some rules and guid
                                    </p>
                                    <i class="fa fa-reply col-xs-2 fa-2x icon-replay fa-flip-horizontal text-center no-padding" aria-hidden="false"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--CONTENT END-->

        <!--RIGHT MENU START-->
            @include('templates.partials._menu')
        <!--RIGHT MENU START-->

    </div>

</div>