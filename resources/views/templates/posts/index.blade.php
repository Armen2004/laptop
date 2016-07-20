<div class="wrapper page-wrap">
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
    <section class="content-wrapper">
        <div class="container">
            <div class="row">
                <ul class="blog-posts-block">
                    <li ng-repeat="post in posts | limitTo: paginationLimit()">
                        <div class="col-md-8 blog-post-left ">
                            <p class="post-date"><% post.created_at %></p>
                            {{--<p class="post-date">Saturday, January 16 2016</p>--}}
                            <h2 class="post-title"><% post.title %></h2>
                            {{--<h2 class="post-title">Out For In 2016</h2>--}}
                            <p class="post-author">
                                <% post.admin.name %>
                            </p>
                            <p class="post-full">
                                <span ng-bind-html="post.description | limitTo:500"></span>
                                <span class="read-more"><a ng-href="#/post/<% post.slug %>">Read More</a></span>
                            </p>
                            <div class="social-links blog-posts-social-links">
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
                        <div class="col-md-4 no-padd  post-image">
                            <img ng-src="<% S3_URL + post.image %>" alt="" class="img-responsive ">
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="load-more">
            <a href="javascript:;" ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()">
                Load more...
            </a>
        </div>
    </section>
    <!-----Content END--------->
</div>