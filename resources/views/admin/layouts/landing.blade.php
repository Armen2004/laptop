<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laptop Startup</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="{{ elixir('css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

<ng-view></ng-view>

<div class="clr"></div>
<!--------------footer start------------->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <p>Copy Right Bakker Research International Limited 2016</p>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="footer-nav">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="footer-right-link">
                    <ul>
                        <li><a href="#">Our Products:</a></li>
                        <li><a href="#">Premium Membership</a></li>
                        <li><a href="#">Laptop Startup</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--------------footer end------------->
<script src="{{ elixir('js/main.js') }}" type="text/javascript"></script>

<script src="{{ elixir('js/angular.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/controllers/HomeController.js') }}" type="text/javascript"></script>

</body>
</html>
