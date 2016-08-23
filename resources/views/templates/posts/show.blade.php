
<div class="container-fluid dashboard-container">

    @include('templates.partials._nav2')

    <div class="content blog-content-all no-padding col-xs-12">

        <div class="blog-border-content">
            <section class="blog-content col-xs-12 no-padding">
                <div>
                    <div class="block-background col-xs-12 no-padding">
                        <img ng-src="<% S3_URL + post.image %>" alt="<% post.title %>">
                    </div>

                    <div class="col-xs-1 blog-left-block no-padding">
                        <img src="images/profile-sm.png" class="img-responsive blog-profile">
                        <p class="text-center">Sam Baker</p>


                    </div>

                    <div class="col-xs-10 blog-text">
                        <div class="blog-mini-title col-xs-12 no-padding">
                            <p class="blog-data col-xs-8">Saturday, January 16 2016</p>
                            <p class="text-right col-xs-4 blog-icon-timer">
                                <i class="fa fa-clock-o fa-2x" aria-hidden="true"></i> 8 minutes ago
                            </p>
                        </div>
                        <h1>8 Digital Marketing Trends To Watch Out For In 2016</h1>
                        <div class="col-xs-12 no-padding">

                            <p>

                                January is well underway. We've survived the holidays and had a bit of recovery time, which means it's time to start looking towards the future. What does 2016 hold for you and your business? How can you expect the marketing space to change in 2016?

                                Digital marketing, as you definitely know, is ever-changing and rapidly adapts itself to
                                new technology, new attitudes and new behaviors. As a marketer, you must always be
                                aware of what's on the horizon to make sure you're prepared, with the best marketing
                                strategy.

                                Technology will have the largest impact on marketing efforts in the coming year. Whether
                                it's video production (and consumption) or wearable gadgets, rapidly developing
                                technology is set to break boundaries and push us all out of our comfort zones.

                                Don't know what to prepare for? Here are some digital marketing trends that are likely
                                to dominate the marketing space in the new year. </p>


                            <h2>1. Visual SEO</h2>
                            <p>

                                Optimizing your site for search engines is an ongoing and ever-evolving process. Google
                                (and other search engines) are regularly tweaking their algorithms to ensure we always
                                find the best results.

                                There is no doubt that the way we consume content has changed drastically in the past
                                couple of years. Our attention spans have become increasingly limited and we are much
                                more attracted to visual content such as photos, infographics and video over traditional
                                plain text.

                                While plain text will always be important, in 2016 it’s likely search engines will start
                                to place even more importance on visual content, as that is what users want. According
                                to this Demand Gen report, even the B2B audience is becoming increasingly interested in
                                visual content when making purchase decisions. 
                                Engaging visual content means a user is likely to spend more time on your website. This
                                is a good signal for search engines. Additionally, a site with more visual content is
                                likely to start ranking better in search engines. If your visual content starts to
                                appear in search results and users click through, you will get additional brownie points
                                from Google for relevance.</p>


                            <h2>2. Video Domination </h2>
                            <p>Whether it’s Netflix, YouTube, Instagram, or even live streaming options such as Facebook
                                Live and Periscope, video is going to dominate the visual content marketing and
                                consumption space in 2016.

                                In a Nielsen global survey of 30,000 respondents from 60 countries, 55% of respondents
                                asserted that video programming is an important part of their lives. Whether it’s on
                                mobiles, desktops or smart TVs, video, in its many forms, is well loved by the average
                                internet user.

                                It’s also important to note that mobile video plays a huge role in video consumption.
                                For Millennials and Generation Z, mobile is very often the primary or the secondary
                                device for video. For out-of-home video consumption, mobile is the primary device of
                                choice for all generations. I’ll talk about mobile in more detail below. </p>


                            <div class="col-xs-12 blog-img-bottom no-padding">
                                <img src="images/blogimg.png" class="img-responsive">


                            </div>


                        </div>
                    </div>


                    <div class="col-xs-1 blog-icons text-center">


                        <a href="#" class="text-center"><i class="fa fa-twitter fa-3x icon-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="text-center"><i class="fa fa-envelope fa-3x icon-message" aria-hidden="true"></i></a>
                        <a href="#" class="text-center"><i class="fa fa-facebook fa-3x icon-facebook" aria-hidden="true"></i></a>


                    </div>

                    <div class="col-xs-12 blog-pagination">
                        <p class="col-xs-6 blog-pagination-previous">
                            <i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>&nbsp;<span class="hidden-sm">PREVIOUS POST</span>
                        </p>
                        <p class="col-xs-6 blog-pagination-next">
                            <span class="hidden-sm">NEXT POST</span>&nbsp;<i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                        </p>
                    </div>


                </div>


            </section>


        </div>
    </div>

    <div id="dashboard_profile" class="col-md-3 hidden col-sm-12">

        <div class="row">
              <span class="col-md-6 ">
                    <i class="fa fa-times fa-2x icon-close" aria-hidden="true"></i>
                </span>
            <span class="col-md-6 ">
                    <i class="fa fa-power-off fa-2x icon_off" aria-hidden="true"></i>
                </span>
        </div>

        <div class="row">
            <div class="col-md-12 text-center no-padding">
                <div class="">
                    <img src="images/profile-sm.png" class="img-circle" width="100px" height="100px">
                    <img src="images/green.png" class="green-img-circle"></div>
                <p class="text-center dashboard_profile_edit ">Edit image</p>

                <div class="name-text">
                    <h2>Sam Baker</h2>
                    <h4 class="text-blue">FREE MEMBER</h4>
                    <!--<h4 class="text-pink">PREMIUM MEMBER</h4>-->
                    <p>Joined: Mar 2016</p>
                </div>

                <div class="dashboard_menu">
                    <ul class="nav nav-pills nav-stacked nav_menu">
                        <li><a href="#">DASHBOARD</a></li>
                        <li><a href="#">MY FORUM ACTIVITY</a></li>
                        <li><a href="#">MY LESSONS</a></li>
                    </ul>
                </div>


            </div>
        </div>


    </div>

</div>

{{--<div class="wrapper clearfix page-wrap">--}}
    {{--<!---Header start--->--}}
    {{--<header>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4 header-part-1 clearfix">--}}
                    {{--<div class="block-container pull-right-block">--}}
                        {{--<img src="/images/logo-s.png" alt="" class="img-responsive">--}}
                        {{--<span class="search-block">--}}
                         {{--<input type="text" placeholder="Search">--}}
                        {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 header-part-2 blog-p clearfix">--}}
                    {{--<ul class="web-header">--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                                {{--Questions?--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                                {{--0800-448938--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                                {{--Support--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                                {{--Favorites--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-md-2 header-part-3">--}}
                    {{--<span><% userInfo.name %> </span>--}}
                    {{--<img src="<% S3_URL + userInfo.image %>" alt="<% userInfo.name %>">--}}
                    {{--<i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()" ng-controller="AuthController"></i>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</header>--}}
    {{--<!---Header END--->--}}
    {{--<!-----Content--------->--}}
    {{--<section class="content-wrapper blog-inner-page">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12 post-image-full no-padd">--}}
                    {{--<img ng-src="<% S3_URL + post.image %>" alt="<% post.title %>" class="img-responsive">--}}
                {{--</div>--}}
                {{--<div class="col-md-12 blog-inner-content">--}}
                    {{--<p class="blog-time-block">--}}
                        {{--<i class="fa fa-clock-o" aria-hidden="true"></i>--}}
                        {{--<span class="blog-post-time"><% post.created_at | date:'longDate' %></span>--}}
                    {{--</p>--}}
                    {{--<div class="col-md-3 text-center">--}}
                        {{--<img src="<% S3_URL + post.admin.image %>" alt="<% post.admin.name %>">--}}
                        {{--<p class="post-inner-author text-center"><% post.admin.name %></p>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9">--}}
                        {{--<p class="post-date"><%  post.created_at %></p>--}}

                        {{--<div class="col-md-10 no-padd page-inner-section">--}}
                            {{--<h2 class="post-title"><% post.title %></h2>--}}
                            {{--<p class="post-full" ng-bind-html="post.description"></p>--}}
                        {{--</div>--}}
                        {{--<div class="social-links blog-inner-social blog-posts-social-links">--}}
                            {{--<i class="fa fa-twitter" aria-hidden="true" socialshare--}}
                               {{--socialshare-provider="twitter"--}}
                               {{--socialshare-text="<% post.title %>"--}}
                               {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                               {{--socialshare-url="<% SITE_URL + '#/post/' + post.slug %>">--}}
                            {{--</i>--}}
                            {{--<i class="fa fa-envelope" aria-hidden="true" socialshare--}}
                               {{--socialshare-provider="google"--}}
                               {{--socialshare-text="<% post.title %>"--}}
                               {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                               {{--socialshare-url="<% SITE_URL + '#/post/' + post.slug %>">--}}
                            {{--</i>--}}
                            {{--<i class="fa fa-facebook" aria-hidden="true" socialshare--}}
                               {{--socialshare-provider="facebook"--}}
                               {{--socialshare-text="<% post.title %>"--}}
                               {{--socialshare-hashtags="angularjs, angular-socialshare"--}}
                               {{--socialshare-url="<% SITE_URL + '#/post/' + post.slug %>">--}}
                            {{--</i>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-12 post-pagination no-padd">--}}
                        {{--<span class="prev-post">--}}
                            {{--<a ng-href="#/" ng-click="previousPost(post.id)">--}}
                                {{--<i class="fa fa-arrow-left" aria-hidden="true"></i> previous post--}}
                            {{--</a>--}}
                        {{--</span>--}}
                        {{--<span class="next-post pull-right">--}}
                            {{--<a ng-href="#/" ng-click="nextPost(post.id)">--}}
                                 {{--next post <i class="fa fa-arrow-right" aria-hidden="true"></i>--}}
                            {{--</a>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--<!-----Content END--------->--}}
{{--</div>--}}
