<div class="col-md-3 content-left no-padd" ng-controller="MenuController">
    <div class="content-left-header">
        <span class="clos-content">
            <img src="/images/icons/close.png" alt="close menu image">
        </span>
        <div class="col-md-12 header-part-3 user-account-details text-center">
            <span class="user-name"><% userInfo.name %> </span>
            <img ng-src="<% S3_URL + userInfo.image %>" alt="<% userInfo.name %>" class="acc-user-image">
            <i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()" style="cursor: pointer" ng-controller="AuthController"></i>
        </div>
        <h3><% completedLessons | number:1 %>%</h3>
        <p class="small-size">FREE LESSONS COMPLETED</p>
        <div class="progress lesson-progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<% completedLessons %>" aria-valuemin="0" aria-valuemax="100" style="width: <% completedLessons %>%;">
                <span class="sr-only"><% completedLessons | number:1 %>% Complete</span>
            </div>
        </div>
    </div>
    <div class="content-left-content clearfix">
        <div class="col-md-12 col-sm-12 no-padd lessons-post-accardion">
            <div class="panel-group wrap">
                <div class="panel" ng-repeat="course in courses">
                    <div class="panel-heading" role="tab">
                        <h4 class="panel-title">
                            <a role="button" ng-click="isCollapsed = !isCollapsed" ng-class="{'collapsed': isCollapsed}">
                                <p class="lesson-type">Course:</p>
                                <p class="package-name"><% course.name %></p>
                                <span class="post-author-image" ng-show="course.image">
                                   <img ng-src="<% S3_URL + course.admin.image %>" alt="" class="img-responsive">
                                </span>
                                <span class="post-author-name" ng-show="course.image">By <% course.admin.name %></span>
                            </a>
                        </h4>
                    </div>
                    <div uib-collapse="isCollapsed" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <ul class="lessons-parent">
                                <li ng-class="{'active': $first==true}" ng-repeat="lesson in  course.lessons" ng-click="goTo(lesson.slug)">
                                    <p class="lesson-info">
                                        <span class="circle-status" ng-class="{'status-blue':lesson.users.length>0}"></span>
                                        <span class="lesson-number">lesson <% lesson.title %>:</span>
                                        <span class="lesson-duration pull-right-block">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i> <% lesson.video_length | toMinSec %>min
                                        </span>
                                    </p>
                                    <div class="lesson-description">
                                        <p class="lesson-title">
                                            <% lesson.title %>
                                        </p>
                                        <p class="lesson-info" ng-bind-html="lesson.description"></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>