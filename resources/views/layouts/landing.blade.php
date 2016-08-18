<!DOCTYPE html>
<html ng-app="app">
    @include('layouts.partials.htmlheader')
<body flow-prevent-drop>

<div class="loading" ng-show="loading">
    <span us-spinner spinner-theme="myCustom" spinner-key="spinner-1" spinner-start-active="true"></span>
</div>

<ng-view></ng-view>

@include('layouts.partials.footer')

@include('layouts.partials.scripts')
</body>
</html>
