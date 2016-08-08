<div class="get-started-wrapper">
    <!-----Content--------->
    <div class="container get-started">
        <div class="col-md-4 col-md-offset-4">
            <div class="get-started-content text-center">
                <span class="close-icon" ng-click="close()">
                    <img ng-src="{{ asset('images/icons/close.png') }}" alt="Close Icon">
                </span>
                <img ng-src="{{ asset('images/white-logo.png') }}" alt="Login Logo" class="img-responsive get-logo">
                <h1 class="sales-subtitle text-center"> GET STARTED  </h1>
                <p class="memeber-title text-center">with your free membership </p>
                <div id="register-form" class="login-form">
                <form ng-submit="user_register(credentials)" name="regForm" ng-controller="AuthController">

                    <div class="inner-addon left-addon" ng-class="regForm.name.$invalid && regForm.name.$touched ? 'has-error text-danger' : 'has-success'">
                        <i class="glyphicon glyphicon-user"></i>
                        <input type="text" class="form-control" placeholder="Your name" ng-model="credentials.name" name="name" required="required" ng-minlength="2">
                    </div>

                    <div class="inner-addon left-addon" ng-class="regForm.email.$invalid && regForm.email.$touched ? 'has-error text-danger' : 'has-success'">
                        <i class="glyphicon glyphicon-envelope"></i>
                        <input type="email" class="form-control" placeholder="Email" ng-model="credentials.email" name="email" required="required" ng-pattern='email'>
                    </div>

                    <div class="inner-addon left-addon" ng-class="regForm.password.$invalid && regForm.password.$touched ? 'has-error text-danger' : 'has-success'">
                        <i class="glyphicon glyphicon-lock"></i>
                        <input type="password" class="form-control" placeholder="Password" ng-model="credentials.password" name="password" required="required" ng-pattern="password">
                    </div>

                    <div class="clearfix"></div>
                    <input type="hidden" ng-model="credentials._token" ng-init="credentials._token='{{ csrf_token() }}'">
                    <button type="submit" ng-disabled="regForm.$invalid">JOIN</button>
                    <p class="have_account" ng-controller="HomeController">Already a member? <a ng-href="javascript:void(0)" ng-click="login()">Login here</a></p>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>