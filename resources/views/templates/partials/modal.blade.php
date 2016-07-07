<div class="get-started-wrapper">
    <!-----Content--------->

    <div class="container get-started">
        <div class="col-md-6 col-md-offset-3 ">
            <div class="get-started-content text-center">
                <span class="close-icon" ng-click="close()" style="cursor: pointer">
                    <img src="/images/icons/close.png" alt="">
                </span>
                <img src="/images/white-logo.png" alt="" class="img-responsive get-logo">
                <h1 class="sales-subtitle text-center"> GET STARTED  </h1>
                <p class="memeber-title text-center">with your free membership </p>
                <form ng-submit="register(credentials)" name="regForm">
                    <input type="text" placeholder="Your name" ng-model="credentials.name" name="name" required="required" ng-minlength="2">
                    <span ng-show="regForm.name.$error.required" class="text-danger"></span>
                    <span ng-show="regForm.name.$error.minlength" class="text-danger">Name required Min 2 symbols.</span>

                    <input type="text" placeholder="Your email" ng-model="credentials.email" name="email" required="required" ng-pattern='email'>
                    <span ng-show="regForm.email.$error.required" class="text-danger"></span>
                    <span ng-show="regForm.email.$error.email" class="text-danger">Please enter valid email. Ex. example@example.com</span>

                    <input type="password" placeholder="Choose password" ng-model="credentials.password" name="password" required="required" ng-minlength="5" ng-maxlength="25" ng-pattern="password">
                    <span ng-show="regForm.password.$error.required"></span>
                    <span ng-show="regForm.password.$error.minlength" class="text-danger">Password required Min 5 symbols.</span>
                    <span ng-show="regForm.password.$error.maxlength" class="text-danger">Password required Max 25 symbols.</span>
                    <span ng-show="regForm.password.$error.pattern" class="text-danger">Password required only a-zA-Z0-9_ symbols.</span>
                    <div class="clearfix"></div>
                    <button type="submit" ng-disabled="regForm.$invalid">JOIN</button>
                </form>
            </div>
        </div>
    </div>
    <!-----Content END--------->
</div>