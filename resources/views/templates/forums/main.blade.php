<div class="forum_all page-wrap">

    <!---Header start--->
@include('templates.forums._header')
<!---Header END--->

    <section class="container-fluid forum_background" id="tabs">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 forum_menu">
                <ul>
                    {{--<li ng-class="{'forum-active': forumID==forum.id || ($first==true && forumID == undefined)}" ng-repeat="forum in forums" ng-click="getForumByID(forum.id)">--}}
                    <li ng-class="{'forum-active': (isActive('/forums') && $first==true) || isActive('/forum/<% forum.slug %>')}" ng-repeat="forum in forums">
                        <a ng-href="#/forum/<% forum.slug %>"><% forum.name %></a>
                    </li>
                </ul>
            </div>
            <div ng-include="'templates/forums/index'" ng-if="!id"></div>
            <div ng-include="'templates/forums/show'" ng-if="id"></div>
        </div>
    </section>
</div>