<div class="wrapper">
    <div class="container-fluid acc-main full-height-container">
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
                <!--header end-->
                <div class="col-md-12 content-right clearfix">
                    <div class="content-right-container">
                        <div class="col-md-12 video-content text-center">
                            <div class="package-time">
                                <div class="time-dur text-center">
                                    <p class="text-center"><i class="fa fa-clock-o" aria-hidden="true"></i> <% lesson.video_length | toMinSec %> min</p>
                                </div>
                            </div>
                            <div class="video-info col-md-8 col-md-offset-2">
                                <div class="social-links">
                                    <i class="fa fa-twitter" aria-hidden="true" socialshare
                                       socialshare-provider="twitter"
                                       socialshare-text="<% lesson.title %>"
                                       {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                                       socialshare-url="<% SITE_URL + '#/lesson/' + lesson.slug %>">
                                    </i>
                                    <i class="fa fa-envelope" aria-hidden="true" socialshare
                                       socialshare-provider="google"
                                       socialshare-text="<% lesson.title %>"
                                       {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                                       socialshare-url="<% SITE_URL + '#/lesson/' + lesson.slug %>">
                                    </i>
                                    <i class="fa fa-facebook" aria-hidden="true" socialshare
                                       socialshare-provider="facebook"
                                       socialshare-text="<% lesson.title %>"
                                       {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                                       socialshare-url="<% SITE_URL + '#/lesson/' + lesson.slug %>">
                                    </i>
                                </div>
                                <video width="100%" height="390" src="<% S3_URL + lesson.video | trustUrl %>" controls="controls"></video>
                                <div class="col-md-12 package-info">
                                    <p class="pack-lesson-title">
                                        <span class="lesson-count">Lesson 1:</span>
                                        <span class="lesson-int"><% lesson.title %>
                                            <button class="complete-mark" ng-show="lesson.users.length == 0" ng-click="complete_lesson(lesson.id)">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                mark as complete
                                            </button>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="video-controls">
                            <span class="prev-video" ng-click="previousLesson(lesson.id)"><i class="fa fa-caret-left" aria-hidden="true"></i>Previous</span>
                            <span class="next-video" ng-click="nextLesson(lesson.id)">Next<i class="fa fa-caret-right" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 video-post-info">
                    <div class="col-md-3 video-post-left">
                        <img ng-src="<% S3_URL + lesson.admin.image %>" alt="<% lesson.admin.name %>" class="img-responsive">
                        <h4>by <% lesson.admin.name %></h4>
                        <span class="download-pdf">
                            <a target="_self" ng-href="<% S3_URL + lesson.pdf %>" download="<% S3_URL + lesson.pdf %>">
                               <img ng-src="/images/pdf.png" alt="<% lesson.slug %>">
                                <span>
                                    download <br/>
                                    training guide
                                </span>
                            </a>
                        </span>
                    </div>
                    <div class="col-md-9">
                        <p ng-bind-html="lesson.description"></p>
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
</div>
