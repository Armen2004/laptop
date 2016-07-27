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

                    <form ng-submit="user_login(credentials)" name="loginForm" ng-controller="AuthController">

                        <input type="text" class="login-mine" placeholder="&#xf0e0; Email" ng-model="credentials.email"  name="email" required="required" ng-pattern='email'>
                        <span ng-show="loginForm.email.$error.required" class="text-danger"></span>
                        <span ng-show="loginForm.email.$error.email" class="text-danger">Please enter valid email. Ex. example@example.com</span>

                        <input type="password" placeholder="&#xf023; Password" class="login-password" ng-model="credentials.password" name="password" required="required" ng-pattern="password">
                        <span ng-show="loginForm.password.$error.required"></span>
                        <span ng-show="loginForm.password.$error.pattern" class="text-danger">Password required only a-zA-Z0-9_ symbols.</span>
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