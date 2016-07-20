<div class="forum_all page-wrap">

    <!---Header start--->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-4 header-part-1 clearfix">
                    <div class="block-container pull-right-block">
                        <img ng-src="/images/logo-s.png" alt="" class="img-responsive">
                        <span class="search-block">
                         <input type="text" placeholder="Search">
                        </span>
                    </div>
                </div>
                <div class="col-md-6 header-part-2 blog-p clearfix">
                    <ul class="web-header">
                        <li><a ng-href="javascript:void(0)">
                                Questions?
                            </a>
                        </li>
                        <li>
                            <a ng-href="javascript:void(0)">
                                0800-448938
                            </a>
                        </li>
                        <li>
                            <a ng-href="javascript:void(0)">
                                Support
                            </a>
                        </li>
                        <li>
                            <a ng-href="javascript:void(0)">
                                Favorites
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2 header-part-3">
                    <span>Sam Baker</span>
                    <img ng-src="/images/profile-img.png" alt="">
                    <i class="fa fa-power-off" aria-hidden="true" ng-click="user_logout()"ng-controller="AuthController"></i>
                </div>
            </div>
        </div>
    </header>
    <!---Header END--->

    <section class="container-fluid forum_background" id="tabs">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 forum_menu">
                <ul>
                    <li ng-repeat="forum in forums"><a ng-href="#/"><% forum.name %><span class="arrow"></span></a></li>
                </ul>
            </div>
            <div class="forum_block col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
                <h1>Hi from Scotland - Brrrr!</h1>
                <article class="row row_bordered">
                    <div class="col-md-3 forum_left text-center">
                        <img ng-src="/images/profile-sm.png" class="forum_img" class="img-responsive">
                        <img ng-src="/images/green.png" class="forum_circle" class="img-responsive">
                        <p class="forum_name text-center">Sam Baker</p>
                        <p class="forum_blue text-center text-uppercase">FREE MEMBER</p>
                        <i class=" col-xs-6 fa fa-comments-o fa-2x" aria-hidden="true"></i>
                        <i class=" col-xs-6 fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i>
                        <div>
                            <p class="col-xs-6 forum_numbers no-padding">0</p>
                            <p class="col-xs-6 forum_numbers no-padding">0</p>
                        </div>
                        <p class="forum_data">Joined: Mar 2016</p>
                        <p class="forum_data">Thanked 4 Times in 0 Posts</p>
                    </div>
                    <div class="col-md-9 forum_right">
                        <h2 class="col-md-9 col-xs-10 no-padding">Hi from Scotland - Brrrr!</h2>
                        <p class="forum_data_top col-md-3 col-xs-2">08-02-2016 04:40 AM</p>
                        <p class="forum_content">
                            Love it - the first words I read are "Type something"

                            I'm just following Sam's instructions to join - as part of his latest product pitch - so
                            as1does, I
                            thought I might as well, but it's well past my bed time being now 04.30 am so I'll just
                            say,
                            as1does, that I look forward to speaking with you all and learning lots.

                            Usually I get lost on these boards so if you see a post in the wrong place, perhaps you'd be
                            kind
                            enough to show me where the post should be.

                            Don't think Sam appreciated my droll humour when I asked him to type slowly on here, cos I
                            don't
                            read too fast. Wow doesn't he speak quickly!

                            Right that's me off to find a few hours before the sunrises again, even if behind a few
                            clouds. ;-)
                        </p>
                        <div class="forum-butons-group">
                            <ul class="list-inline pull-right no-padding">
                                <li>
                                    <button class="text-uppercase"><span><i class="fa fa-thumbs-up"></i></span>Thanks
                                    </button>
                                </li>
                                <li>
                                    <button class="text-uppercase"><span><i class="fa fa-reply"></i></span>REPLY
                                    </button>
                                </li>
                                <li>
                                    <button class="text-uppercase">
                                        <span> <i class="fa fa-quote-right" aria-hidden="true"></i></span>
                                        REPLY WITH QUOTE
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <p class=" forum_ps" id="forum_ps1"><span>4 users</span>&nbsp;said Thanks to this useful post</p>
                    </div>
                </article>

                <article class="row row_bordered">
                    <div class="col-md-3 forum_left text-center">
                        <img ng-src="/images/profile-sm.png" class="forum_img" class="img-responsive">
                        <img ng-src="/images/gray.png" class="forum_circle" class="img-responsive">
                        <p class="forum_name text-center">Sam Baker</p>
                        <p class="forum_blue text-center text-uppercase">FREE MEMBER</p>
                        <i class=" col-xs-6 fa fa-comments-o fa-2x" aria-hidden="true"></i>
                        <i class=" col-xs-6 fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i>
                        <div>
                            <p class="col-xs-6 forum_numbers no-padding">0</p>
                            <p class="col-xs-6 forum_numbers no-padding">0</p>
                        </div>
                        <p class="forum_data">Joined: Mar 2016</p>
                        <p class="forum_data">Thanked 4 Times in 0 Posts</p>
                    </div>
                    <div class="col-md-9 forum_right">
                        <h2 class="col-md-9 col-xs-10 no-padding">Hi from Scotland - Brrrr!</h2>
                        <p class="forum_data_top col-md-3 col-xs-2">08-02-2016 04:40 AM</p>
                        <p class="forum_content">
                            Love it - the first words I read are "Type something"

                            I'm just following Sam's instructions to join - as part of his latest product pitch - so
                            as1does, I
                            thought I might as well, but it's well past my bed time being now 04.30 am so I'll just
                            say,
                            as1does, that I look forward to speaking with you all and learning lots.

                            Usually I get lost on these boards so if you see a post in the wrong place, perhaps you'd be
                            kind
                            enough to show me where the post should be.

                            Don't think Sam appreciated my droll humour when I asked him to type slowly on here, cos I
                            don't
                            read too fast. Wow doesn't he speak quickly!

                            Right that's me off to find a few hours before the sunrises again, even if behind a few
                            clouds. ;-)
                        </p>
                        <div class="forum-butons-group">
                            <ul class="list-inline pull-right no-padding">
                                <li>
                                    <button class="text-uppercase"><span><i class="fa fa-thumbs-up"></i></span>Thanks
                                    </button>
                                </li>
                                <li>
                                    <button class="text-uppercase"><span><i class="fa fa-reply"></i></span>REPLY
                                    </button>
                                </li>
                                <li>
                                    <button class="text-uppercase">
                                        <span><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                                        REPLY WITH QUOTE
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <p class=" forum_ps" id="forum_ps1"><span>4 users</span>&nbsp;said Thanks to this useful post</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
</div>