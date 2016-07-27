<div class="col-lg-2 forum_left_post text-center">
    <img ng-src="<% S3_URL + post.user.image %>" class="forum_img_post">
    <img ng-src="/images/green.png" class="forum_circle_post" ng-show="online(post.user.last_activity)">
    <img ng-src="/images/gray.png" class="forum_circle_post" ng-show="!online(post.user.last_activity)">
</div>
<div class="col-lg-10 forum_right_post">
    <div class="clearfix"></div>
    <div class="row">
        <div class="text-left col-sm-6 forum_name_post"><% post.user.name %></div>
        <div class="forum_data text-right col-sm-6" >Wrote: <% post.created_at | toDate:true %></div>
    </div>
    <p class="forum_content" ng-bind-html="post.comment"></p>
    <div class="forum-butons-group">
        <ul class="list-inline pull-right no-padding forum_buttons">
            <li>
                <button class="text-uppercase forum_reply2" ng-click="isReplyFormOpen(post.id, post.user.name)">
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
                <button class="text-uppercase forum_button_green forum_send" ng-click="createPost(forum, currentForum)" ng-disabled="postForm.$invalid">SEND</button>
            </div>
        </div>
    </form>
</div>
{{--<div class="row row_bordered" ng-repeat="post in post.children" ng-include="'templates/forums/posts'"></div>--}}
