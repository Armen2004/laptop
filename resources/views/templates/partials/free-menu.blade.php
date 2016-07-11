<div class="col-md-3 content-left acc-content-left no-padd" ng-controller="MenuController">
    <div class="content-left-header">
        <span class="clos-content">
            <img src="/images/icons/close.png" alt="close menu image">
        </span>
        <p class="login-date">Last login: <% userInfo.updated_at | date:'medium' %>
            {{--<span>3rd Feb 2016, 02:09 PM</span>--}}
            <i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()" style="cursor: pointer" ng-controller="AuthController"></i>
        </p>
        <div class="col-md-12 right-sidebar-content text-center">
            <img ng-src="<% S3_URL + userInfo.image %>" alt="<% userInfo.name %>" class="acc-user-image">
            <p class="text-center acc-user-name"><% userInfo.name %></p>
            <p class="text-center acc-user-msg"><i class="fa fa-envelope" aria-hidden="true"></i></p>
        </div>
        <h3 class="completed-percent clearfix"><% completedLesson(courses) %> 67%</h3>
        <p class="lessons-comp-title">FREE LESSONS COMPLETED</p>
        <div class="progress lesson-progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;">
                <span class="sr-only">67% Complete</span>
            </div>
        </div>
        <p class="acc-lesson-title">lessons:</p>
        <ul class="lessons-parent acc-lessons">
            <li ng-class="{'lesson-completed': course.users.length > 0}" ng-repeat="course in courses" ng-click="goTo(course.slug)">
                <p class="lesson-info" ng-href="<% course.slug %>">
                    <span class="circle-status"></span>
                    <span class="lesson-number"><% course.title %>:</span>
                </p>
            </li>
            <li class="">
                <p class="lesson-info">
                    <span class="circle-status "></span>
                    <span class="lesson-number">Scaling your product</span>
                </p>
            </li>

        </ul>
    </div>
</div>