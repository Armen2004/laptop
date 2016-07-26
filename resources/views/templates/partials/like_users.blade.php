<div class="col-sm-6 col-sm-offset-3">
    <button class="btn btn-warning" type="button" ng-click="close()">Cancel</button>
    <ul style="background: #fff">
        <li ng-repeat="forum in forums">
            <img ng-src="<% S3_URL + forum.image %>" alt="<% forum.name %>"><% forum.name %>
        </li>
    </ul>
</div>
