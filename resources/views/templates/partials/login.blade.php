<div class="get-started-wrapper">
    <!-----Content--------->
    <div class="container get-started">
        <div class="col-sm-4 col-sm-offset-4 login-cont-all">
            <div class="get-started-content text-center">
                <span class="close-icon" ng-click="close()">
                    <img ng-src="{{ asset('images/icons/close.png') }}" alt="Close Icon">
                </span>
                <img ng-src="{{ asset('images/white-logo.png') }}" id="login-logo-id" alt="Login Logo" class="img-responsive get-logo">
                <div class="login-form">
                    <form ng-submit="user_login(credentials)" name="loginForm" ng-controller="AuthController">

                        <div class="inner-addon left-addon" ng-class="loginForm.email.$invalid && loginForm.email.$touched ? 'has-error text-danger' : 'has-success'">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <input type="email" class="login-mine form-control" placeholder="Email" ng-model="credentials.email"  name="email" required="required" ng-pattern='email'>
                        </div>
                        <div class="inner-addon left-addon" ng-class="loginForm.password.$invalid && loginForm.password.$touched ? 'has-error text-danger' : 'has-success'">
                            <i class="glyphicon glyphicon-lock"></i>
                            <input type="password" placeholder="Password" class="login-password form-control" ng-model="credentials.password" name="password" required="required" ng-pattern="password" ng-minlength="3">
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" ng-model="credentials._token" ng-init="credentials._token='{{ csrf_token() }}'">
                        <button type="submit" class="login-button text-uppercase" ng-disabled="loginForm.$invalid">login</button>
                        <p class="have_account text-right" ng-controller="HomeController"><a ng-href="javascript:void(0)" ng-click="reset_email()">Forgot Password ?</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>