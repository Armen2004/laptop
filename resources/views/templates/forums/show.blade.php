<div class="forum_all page-wrap">

    <!---Header start--->
        @include('templates.forums._header')
    <!---Header END--->

    <section class="container-fluid forum_background" id="tabs">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 forum_menu">
                <ul>
                    <li ng-class="{'forum-active': $first==true}" ng-repeat="forum in forums" ng-click="getForumByID(forum.id)">
                        <a ng-href="javascript:void(0)"><% forum.name %></a>
                    </li>
                </ul>
            </div>
            <div class="forum_block col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
                <article class="row row_bordered">
                    <div class="col-md-3 forum_left text-center">
                        <img ng-src="<% S3_URL + currentForum.user.image %>" class="forum_img">
                        <img ng-src="/images/green.png" class="forum_circle" ng-show="online(currentForum.user.last_activity)">
                        <img ng-src="/images/gray.png" class="forum_circle" ng-show="!online(currentForum.user.last_activity)">
                        <p class="forum_name text-center"><% currentForum.user.name %></p>
                        <i class=" col-xs-6 fa fa-comments-o fa-2x" aria-hidden="true"></i>
                        <i class=" col-xs-6 fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i>
                        <div>
                            <p class="col-xs-6 forum_numbers no-padding"><% currentForum.forum_posts.length %></p>
                            <p class="col-xs-6 forum_numbers no-padding"><% currentForum.likes %></p>
                        </div>
                        <p class="forum_data">Joined: <% currentForum.user.created_at | toDate %></p>
                        <p class="forum_data">Thanked <% currentForum.likes %> Times in 0 Posts</p>
                    </div>
                    <div class="col-md-9 forum_right">
                        <h2 class="col-md-9 col-xs-10 no-padding"><% currentForum.title %></h2>
                        <p class="forum_data_top col-md-3 col-xs-2"><% currentForum.created_at %></p>
                        <p class="forum_content"><% currentForum.description %></p>
                        <div class="forum-butons-group">
                            <ul class="list-inline pull-right no-padding forum_buttons">
                                <li>
                                    <button class="text-uppercase forum_button_green" ng-click="like_topic(currentForum.id)">
                                        <span><i class="fa fa-thumbs-up"></i></span>Thanks
                                    </button>
                                </li>
                                <li>
                                    <button class="text-uppercase" id="forum_reply" ng-click="isReplyFormOpen()">
                                        <span><i class="fa fa-reply"></i></span>REPLY
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>

                <div class="forum_button_r-cont show-topic-replay pull-right-block" ng-show="display">
                    <form name="postForm">
                        <div class="forum_button_r">
                            <div class="text-right">
                                <textarea id="forum_textarea" ckeditor="editorOptions" ng-model="forum.comment" required="required"></textarea>
                                <input type="hidden" ng-model="forum._token" ng-init="forum._token='{{ csrf_token() }}'">
                            </div>
                            <div CLASS="text-right">
                                 <button class="text-uppercase forum_button_green forum_send" ng-click="createPost(forum, currentForum)" ng-disabled="postForm.$invalid">SEND</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="clearfix"></div>

                <article class="row row_bordered" ng-repeat="post in currentForum.forumPosts">
                    <div class="col-md-3 forum_left text-center">
                        <img ng-src="<% S3_URL + post.user.image %>" class="forum_img">
                        <img ng-src="/images/green.png" class="forum_circle" ng-show="online(currentForum.user.last_activity)">
                        <img ng-src="/images/gray.png" class="forum_circle" ng-show="!online(currentForum.user.last_activity)">
                        <p class="forum_name text-center"><% post.user.name %></p>
                        <p class="forum_data">Joined: <% post.created_at | toDate %></p>
                    </div>
                    <div class="col-md-9 forum_right">
                        <div class="clearfix"></div>
                        <p class="forum_content post-description" ng-bind-html="post.comment"></p>
                        <div class="forum-butons-group">
                            <ul class="list-inline pull-right no-padding forum_buttons">
                                <li>
                                    <button class="text-uppercase forum_reply2" ng-click="isReplyFormOpen(post.id)">
                                        <span><i class="fa fa-reply"></i></span> &nbsp;REPLY
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="forum_button_r-cont show-topic-replay pull-right-block" ng-if="replay==post.id">
                        <hr>
                        <form name="postForm">
                            <div class="forum_button_r">
                                <div class="text-right">
                                    <textarea id="forum_textarea" ckeditor="editorOptions" ng-model="forum.comment" required="required"></textarea>
                                    <input type="hidden" ng-model="forum._token" ng-init="forum._token='{{ csrf_token() }}'">
                                </div>
                                <div CLASS="text-right">
                                    <button class="text-uppercase forum_button_green forum_send" ng-click="createPost(forum, currentForum, post.id)" ng-disabled="postForm.$invalid">SEND</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <article class="row row_bordered " ng-repeat="children in post.childrens">
                        <div>
                        <div class="col-md-2 forum_left text-center forum_article_comment">
                            <img ng-src="<% S3_URL + children.user.image %>" class="forum_img forum_img_comment">
                            <img ng-src="/images/green.png" class="forum_circle forum_circle_comment " ng-show="online(children.user.last_activity)">
                            <img ng-src="/images/gray.png" class="forum_circle" ng-show="!online(children.user.last_activity)">
                            <p class="forum_name text-center forum_text_comment"><% children.user.name %></p>
                            <p class="forum_data forum_text_comment">Joined: <% children.created_at | toDate %></p>
                        </div>
                        <div class="col-md-9 forum_right">
                            <div class="clearfix"></div>
                            <p class="forum_content post-description" ng-bind-html="children.comment"></p>
                            <div class="forum-butons-group">
                                <ul class="list-inline pull-right no-padding forum_buttons">
                                    <li>
                                        <button class="text-uppercase forum_reply2" ng-click="isReplyFormOpen(children.id)">
                                            <span><i class="fa fa-reply"></i></span> &nbsp;REPLY
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="forum_button_r-cont show-topic-replay pull-right-block" ng-if="replay==children.id">
                            <hr>
                            <form name="postForm">
                                <div class="forum_button_r">
                                    <div class="text-right">
                                        <textarea id="forum_textarea" ckeditor="editorOptions" ng-model="forum.comment" required="required"></textarea>
                                        <input type="hidden" ng-model="forum._token" ng-init="forum._token='{{ csrf_token() }}'">
                                    </div>
                                    <div CLASS="text-right">
                                        <button class="text-uppercase forum_button_green forum_send" ng-click="createPost(forum, currentForum, children.id)" ng-disabled="postForm.$invalid">SEND</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </article>

                </article>
            </div>
        </div>
    </section>
</div>