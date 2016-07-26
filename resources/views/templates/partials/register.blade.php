<div class="get-started-wrapper">
    <!-----Content--------->
    <div class="container get-started">
        <div class="col-md-6 col-md-offset-3 ">
            <div class="get-started-content text-center">
                <span class="close-icon" ng-click="close()">
                    <img ng-src="{{ asset('images/icons/close.png') }}" alt="Close Icon">
                </span>
                <img ng-src="{{ asset('images/white-logo.png') }}" alt="Login Logo" class="img-responsive get-logo">
                <h1 class="sales-subtitle text-center"> GET STARTED  </h1>
                <p class="memeber-title text-center">with your free membership </p>
                <form ng-submit="user_register(credentials)" name="regForm" ng-controller="AuthController">

                    <input type="text" placeholder="&#xf007; Your name" ng-model="credentials.name" name="name" required="required" ng-minlength="2">
                    <span ng-show="regForm.name.$error.required" class="text-danger"></span>
                    <span ng-show="regForm.name.$error.minlength" class="text-danger">Name required Min 2 symbols.</span>

                    <input type="text" placeholder="&#xf0e0; Your email" ng-model="credentials.email" name="email" required="required" ng-pattern='email'>
                    <span ng-show="regForm.email.$error.required" class="text-danger"></span>
                    <span ng-show="regForm.email.$error.email" class="text-danger">Please enter valid email. Ex. example@example.com</span>

                    <input type="password" placeholder="&#xf023; Choose password" ng-model="credentials.password" name="password" required="required" ng-pattern="password">
                    <span ng-show="regForm.password.$error.required"></span>
                    <span ng-show="regForm.password.$error.pattern" class="text-danger">Password required only a-zA-Z0-9_ symbols.</span>

                    <div class="clearfix"></div>
                    <input type="hidden" ng-model="credentials._token" ng-init="credentials._token='{{ csrf_token() }}'">
                    <button type="submit" ng-disabled="regForm.$invalid">JOIN</button>
                    <p class="have_account" ng-controller="HomeController">Already a member? <a ng-href="javascript:void(0)" ng-click="login()">Login here</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>