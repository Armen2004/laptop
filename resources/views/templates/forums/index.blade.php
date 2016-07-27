<div class="forum_block col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
    <h1><% currentForum.description %></h1>
    <article class="row row_bordered" ng-repeat="topic in currentForum.forum_topics | limitTo: paginationLimit()">
        <div class="col-md-3 forum_left text-center">
            <img ng-src="<% S3_URL + topic.user.image %>" class="forum_img">
            <img ng-src="/images/green.png" class="forum_circle" ng-show="online(topic.user.last_activity)">
            <img ng-src="/images/gray.png" class="forum_circle" ng-show="!online(topic.user.last_activity)">
            <p class="forum_name text-center"><% topic.user.name %></p>
            <p class="forum_blue text-center text-uppercase"><% topic.user.user_type.name %></p>
            <i class=" col-xs-6 fa fa-comments-o fa-2x" aria-hidden="true"></i>
            <i class=" col-xs-6 fa fa-thumbs-o-up fa-2x" aria-hidden="true"></i>
            <div>
                <p class="col-xs-6 forum_numbers no-padding"><% topic.forum_posts.length %></p>
                <p class="col-xs-6 forum_numbers no-padding"><% topic.likes %></p>
            </div>
            <p class="forum_data">Joined: <% topic.user.created_at | toDate %></p>
            <p class="forum_data">Thanked <% topic.likes %> Times in 0 Posts</p>
        </div>
        <div class="col-md-9 forum_right">
            <h2 class="col-md-9 col-xs-10 no-padding">
                <a ng-href="#/forum/<% currentForum.slug %>/<% topic.slug %>" class="topic-title">
                    <% topic.title %>
                </a>
            </h2>
            <p class="forum_data_top col-md-3 col-xs-2"><% topic.created_at %></p>
            <p class="forum_content"><% topic.description %></p>
            <div class="forum-butons-group">
                <ul class="list-inline pull-right no-padding">
                    <li>
                        <p class="forum_ps" id="forum_ps1" ng-click="like_users(topic.id)">
                            <span class="liked-users"><% topic.likes %> users</span>&nbsp;said Thanks to this useful post</p>
                    </li>
                    <li>
                        <button class="text-uppercase" ng-click="like_topic(topic.id)">
                            <span><i class="fa fa-thumbs-up"></i></span>Thanks</button>
                    </li>
                    <li>
                        <button class="text-uppercase" ng-click="isReplyFormOpen()"><span><i class="fa fa-reply"></i></span>REPLY</button>
                    </li>
                </ul>
            </div>
            <div class="forum_button_r-cont show-topic-replay pull-right-block" ng-show="display">
            <div class="clearfix">&nbsp;</div>
            <hr>
                <form name="postForm">
                    <div class="forum_button_r">
                        <div class="text-right">
                            <textarea id="forum_textarea" ckeditor="editorOptions" ng-model="forum.comment" required="required"></textarea>
                            <input type="hidden" ng-model="forum._token" ng-init="forum._token='{{ csrf_token() }}'">
                        </div>
                        <div CLASS="text-right">
                            <button class="text-uppercase forum_button_green forum_send" ng-click="replayToTopic(currentForum, forum, topic)" ng-disabled="postForm.$invalid">SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </article>

    <div class="load-more">
        <a href="javascript:;" ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()">
            Load more...
        </a>
    </div>
</div>
