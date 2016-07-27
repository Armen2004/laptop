{{--<form name="resetForm">--}}
    {{--<input type="hidden" name="_token" ng-model="reset._token" ng-init="reset._token='{{ csrf_token() }}'">--}}
    {{--<input type="hidden" name="token" ng-model="reset.token" ng-init="token">--}}
    {{--<div class="form-group has-feedback">--}}
        {{--<input type="email" class="form-control" placeholder="Email" name="email" ng-model="reset.email"/>--}}
        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
    {{--</div>--}}

    {{--<div class="form-group has-feedback">--}}
        {{--<input type="password" class="form-control" placeholder="Password" name="password" ng-model="reset.password"/>--}}
        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
    {{--</div>--}}

    {{--<div class="form-group has-feedback">--}}
        {{--<input type="password" class="form-control" placeholder="Password" name="password_confirmation" ng-model="reset.password_confirmation"/>--}}
        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
    {{--</div>--}}

    {{--<div class="row">--}}
        {{--<div class="col-xs-8">--}}
            {{--<button type="submit" class="btn btn-primary btn-block btn-flat">Reset password</button>--}}
        {{--</div><!-- /.col -->--}}
    {{--</div>--}}
{{--</form>--}}


<div class="get-started-wrapper">
    <!-----Content--------->
    <div class="container get-started">
        <div class="col-sm-4 col-sm-offset-4 login-cont-all">
            <div class="get-started-content text-center">
                <img ng-src="{{ asset('images/white-logo.png') }}" id="login-logo-id" alt="Login Logo" class="img-responsive get-logo">
                <div id="login-mine">
                    <span class="close-icon" ng-click="close()">
                        <img ng-src="{{ asset('images/icons/close.png') }}" alt="Close Icon">
                    </span>

                    <form ng-submit="user_reset_password(credentials)" name="loginForm" ng-controller="AuthController">

                        <input type="text" class="login-mine" placeholder="&#xf0e0; Email" ng-model="credentials.email"  name="email" required="required" ng-pattern='email'>
                        <span ng-show="loginForm.email.$error.required" class="text-danger"></span>
                        <span ng-show="loginForm.email.$error.email" class="text-danger">Please enter valid email. Ex. example@example.com</span>

                        <input type="password" placeholder="&#xf023; Password" class="login-password" ng-model="credentials.password" name="password" required="required" ng-pattern="password">
                        <span ng-show="loginForm.password.$error.required"></span>
                        <span ng-show="loginForm.password.$error.pattern" class="text-danger">Password required only a-zA-Z0-9_ symbols.</span>

                        <input type="password" placeholder="&#xf023; Password" class="login-password" ng-model="credentials.password_confirmation" name="password_confirmation" required="required" ng-pattern="password">
                        <span ng-show="loginForm.password.$error.required"></span>
                        <span ng-show="loginForm.password.$error.pattern" class="text-danger">Password required only a-zA-Z0-9_ symbols.</span>

                        <div class="clearfix"></div>
                        <input type="hidden" ng-model="credentials._token" ng-init="credentials._token='{{ csrf_token() }}'">
                        <button type="submit" class="login-button text-uppercase" ng-disabled="loginForm.$invalid">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>