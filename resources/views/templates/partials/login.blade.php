<div class="get-started-wrapper">
    <!-----Content--------->
    <div class="container get-started">
        <div class="col-md-6 col-md-offset-3 ">
            <div class="get-started-content text-center login-content">
                <span class="close-icon login-icon" ng-click="close()">
                    <img src="/images/icons/close.png" alt="">
                </span>
                <img src="/images/white-logo.png" alt="" class="img-responsive get-logo login-logo">
                <form ng-submit="user_register(credentials)" name="regForm" ng-controller="AuthController">

                    <input type="text" placeholder="Your email" ng-model="credentials.email" name="email" required="required" ng-pattern='email'>
                    <span ng-show="regForm.email.$error.required" class="text-danger"></span>
                    <span ng-show="regForm.email.$error.email" class="text-danger">Please enter valid email. Ex. example@example.com</span>

                    <input type="password" placeholder="Choose password" ng-model="credentials.password" name="password" required="required" ng-minlength="5" ng-maxlength="25" ng-pattern="password">
                    <span ng-show="regForm.password.$error.required"></span>
                    <span ng-show="regForm.password.$error.minlength" class="text-danger">Password required Min 5 symbols.</span>
                    <span ng-show="regForm.password.$error.maxlength" class="text-danger">Password required Max 25 symbols.</span>
                    <span ng-show="regForm.password.$error.pattern" class="text-danger">Password required only a-zA-Z0-9_ symbols.</span>
                    <div class="clearfix"></div>
                    <input type="hidden" ng-model="credentials._token" ng-init="credentials._token='{{ csrf_token() }}'">
                    <button type="submit" class="text-uppercase login-button" ng-disabled="regForm.$invalid">Login</button>
                    <p class="have_account" ng-controller="HomeController">Already a member? <a ng-href="javascript:void(0)" ng-click="login()">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>