<div class="get-started-wrapper">
    <!-----Content--------->
    <div class="container get-started">
        <div class="col-sm-4 col-sm-offset-4 login-cont-all">
            <div class="get-started-content text-center">
                <img ng-src="{{ asset('images/white-logo.png') }}" id="login-logo-id" alt="Login Logo" class="img-responsive get-logo">
                <span class="close-icon" ng-click="close()">
                    <img ng-src="{{ asset('images/icons/close.png') }}" alt="Close Icon">
                </span>
                <div class="login-form">

                    <form ng-submit="user_reset(credentials)" name="resetForm" ng-controller="AuthController">
                        <div class="inner-addon left-addon" ng-class="resetForm.email.$invalid && resetForm.email.$touched ? 'has-error text-danger' : 'has-success'">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <input type="email" class="login-mine form-control" placeholder="Email" ng-model="credentials.email"  name="email" required="required" ng-pattern='email'>
                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" ng-model="credentials._token" ng-init="credentials._token='{{ csrf_token() }}'">
                        <button type="submit" class="login-button text-uppercase" ng-disabled="resetForm.$invalid">Reset password</button>
                        <p class="have_account text-right" ng-controller="HomeController">Already a member? <a ng-href="javascript:void(0)" ng-click="login()">Login here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>