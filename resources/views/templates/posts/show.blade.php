<div class="wrapper clearfix page-wrap">
    <!---Header start--->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 header-part-1 clearfix">
                    <div class="block-container pull-right-block">
                        <img src="/images/logo-s.png" alt="" class="img-responsive">
                        <span class="search-block">
                         <input type="text" placeholder="Search">
                        </span>
                    </div>
                </div>
                <div class="col-md-6 header-part-2 blog-p clearfix">
                    <ul class="web-header">
                        <li>
                            <a href="javascript:;">
                                Questions?
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                0800-448938
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Support
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                Favorites
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 header-part-3">
                    <span><% userInfo.name %> </span>
                    <img src="<% S3_URL + userInfo.image %>" alt="<% userInfo.name %>">
                    <i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()" ng-controller="AuthController"></i>
                </div>
            </div>
        </div>
    </header>
    <!---Header END--->
    <!-----Content--------->
    <section class="content-wrapper blog-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 post-image-full no-padd">
                    <img ng-src="<% S3_URL + post.image %>" alt="<% post.title %>" class="img-responsive">
                </div>
                <div class="col-md-12 blog-inner-content">
                    <p class="blog-time-block">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <span class="blog-post-time"><% post.created_at | date:'longDate' %></span>
                    </p>
                    <div class="col-md-3 text-center">
                        <img src="<% S3_URL + post.admin.image %>" alt="<% post.admin.name %>">
                        <p class="post-inner-author text-center"><% post.admin.name %></p>
                    </div>
                    <div class="col-md-9">
                        {{--<p class="post-date"><%  post.created_at %></p>--}}

                        <div class="col-md-10 no-padd page-inner-section">
                            <h2 class="post-title"><% post.title %></h2>
                            <p class="post-full" ng-bind-html="post.description"></p>
                        </div>
                        <div class="social-links blog-inner-social blog-posts-social-links">
                            <i class="fa fa-twitter" aria-hidden="true" socialshare
                               socialshare-provider="twitter"
                               socialshare-text="<% post.title %>"
                               {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                               socialshare-url="<% SITE_URL + '#/post/' + post.slug %>">
                            </i>
                            <i class="fa fa-envelope" aria-hidden="true" socialshare
                               socialshare-provider="google"
                               socialshare-text="<% post.title %>"
                               {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                               socialshare-url="<% SITE_URL + '#/post/' + post.slug %>">
                            </i>
                            <i class="fa fa-facebook" aria-hidden="true" socialshare
                               socialshare-provider="facebook"
                               socialshare-text="<% post.title %>"
                               {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                               socialshare-url="<% SITE_URL + '#/post/' + post.slug %>">
                            </i>
                        </div>
                    </div>
                    <div class="col-md-12 post-pagination no-padd">
                        <span class="prev-post">
                            <a ng-href="#/" ng-click="previousPost(post.id)">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> previous post
                            </a>
                        </span>
                        <span class="next-post pull-right">
                            <a ng-href="#/" ng-click="nextPost(post.id)">
                                 next post <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-----Content END--------->
</div>
