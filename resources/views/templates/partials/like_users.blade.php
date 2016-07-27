<div class="modal-content" id="liked-user">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="close()"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span><% users.length %> users</span>&nbsp;said Thanks to this useful post</h4>
    </div>
    <div class="modal-body">
        <input class="pull-right forum_list_search form-control" placeholder="&#xf002;" ng-model="search">
        <div class="clearfix">&nbsp;</div>
        <ul class="forum_users_list">
            <li ng-repeat="user in users | filter:search">
                <div class="row like_border">
                    <div class="col-md-3 forum_left text-center">
                        <img ng-src="<% S3_URL + user.image %>" class="forum_img_like" alt="<% user.name %>">
                        <img ng-src="/images/green.png" class="forum_circle_like" ng-show="online(user.last_activity)">
                        <img ng-src="/images/gray.png" class="forum_circle_like" ng-show="!online(user.last_activity)">
                    </div>
                    <div  class="col-md-5">
                        <p class="forum_name text-center"><% user.name %></p>
                        <p class="forum_blue_like text-center text-uppercase"><% user.user_type %></p>
                    </div>
                    <div  class="col-md-4">
                        <p class="text-center"><% user.liked_at | toDate:true %></p>
                    </div>
                </div>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
