<div class="forum_block col-lg-9 col-md-8 col-sm-12 col-xs-12 ">
    <article class="row row_bordered">
        <div class="col-lg-3 forum_left text-center">
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

    <div class="row row_bordered_post" ng-repeat="post in currentForum.forum_posts | limitTo: paginationLimit()" ng-include="'templates/forums/posts'"></div>

    <div class="load-more">
        <a href="javascript:;" ng-show="hasMoreItemsToShow()" ng-click="showMoreItems()">
            Load more...
        </a>
    </div>

</div>
