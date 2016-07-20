<!-------------- Header block start -------------->
<div class="container">
    <a ng-href="#/" class="btn-orange pull-right" ng-hide="isLoggedIn" ng-click="login()"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</a>
    <div class="row">
        <div class="home-header-top">
            <div class="logo">
                <a ng-href="#/">
                    <img ng-src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="home-top-right-txt col-xs-7 col-xs-offset-4 ">
                <p>
                    Publish Your Own Products & Make Money Selling Other Peoples
                    Products (As An Affiliate Marketer). We show you how!
                    Create your free Laptop Startup membership and start today!
                </p>
            </div>
        </div>
    </div>
</div>
<!-------------- Header block end -------------->
<!-------------- Login block start -------------->
<div class="container" ng-hide="isLoggedIn">
    <div class="home-login-block" >
        <a class="join-now-btn hvr-sweep-to-right" ng-href="javascript:void(0)" ng-click="signup()">JOIN NOW - IT’S FREE !</a>
    </div>
</div>
<!-------------- Login block end -------------->
<div class="home-top-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <p>
                    Join the #1 Online Marketing Community and training website on the internet, Start making money from
                    your laptop ANYWHERE and ‘start up’ your business. We’re here to help you get back your freedom and
                    say goodbye to your day job.
                </p>
            </div>
            <div class="col-md-7 col-md-offset-1 col-sm-12">
                <div class="banner-video-img">
                    {{--<iframe width="100%" height="345" src="http://www.youtube.com/embed/XGSy3_Czz8k"></iframe>--}}
                    <img ng-src="{{ asset('images/video-img.jpg') }}" alt="Video Img">
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------- Content block start -------------->
<div class="container">
    <div class="home-three-grid-block">
        <h2>Become a member (it's free!) and you'll get...</h2>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="grid-box">
                    <div class="grid-box-img"><img ng-src="{{ asset('images/img-1.gif') }}" alt="Img 1"></div>
                    <h3>
                        Quick-Start <br>
                        Online Marketing Guide
                    </h3>
                    <p>
                        Do you feel confused or overwhelmed by the information you’ve seen about making money online?
                        Let us make it easy for you and walk you through exactly what you need to know. You’re going to
                        get a step by step easy to understand guide that’s going to walk you through how to get started
                        making money fast with our ‘Laptop Startup’ system.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="grid-box">
                    <div class="grid-box-img"><img ng-src="{{ asset('images/img-2.gif') }}" alt="Img 2"></div>
                    <h3>
                        Step By Step <br>
                        Video Training
                    </h3>
                    <p>
                        Look over our shoulder as we step you through what it takes to launch a digital product! It’s
                        now easier than ever with our Step By Step video training. You’ll know within a few videos how
                        to setup your first internet ‘start up’ web business that generates money.
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="grid-box">
                    <div class="grid-box-img"><img ng-src="{{ asset('images/img-3.gif') }}" alt="Img 3"></div>
                    <h3>Downloadable <br>
                        Roadmap to Success
                    </h3>
                    <p> Is it hard understanding where everything ‘fits in’? We are going to show you through every step
                        of the way with our Road-Map to success. You’re going to be able to follow this step by step
                        downloadable guide to start making money. You can print out this guide and refer back to it as
                        you go through the training to get an idea for what you’ve learnt and what you still have to
                        learn and setup.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------- Content block end -------------->
<!-------------- Ready to make block start -------------->
<div class="container-fluid">
    <div class="row">
        <div class="home-ready-content">
            <h2> Ready to make <br>
                great money as an affiliate?
            </h2>
            <div class="home-ready-to-make-block">

                <div class="sign-up-btn" ng-hide="isLoggedIn">
                    <a class="hvr-sweep-to-left" ng-href="javascript:void(0)" ng-click="signup()">Signup For Your Free Account Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------- Ready to make block end -------------->
<!-------------- Testimonials block start -------------->
<div class="home-testimonials-content">
    <div class="laptop-img"><img ng-src="{{ asset('images/laptop-img.png') }}" alt="Laptop Img"></div>
    <div class="container">
        <div class="testimonials-block">
            <div class="row">
                <div class="col-md-12">
                    <h3>TESTIMONIALS</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 sm-hidden"></div>
                <div class="col-md-3 col-sm-4">
                    <div class="second-grid-box mt-50">
                        <div class="testimonials-img">
                            <img ng-src="{{ asset('images/testimonials-img-3.png') }}" alt="Testimonials Img 3" >
                            <h4>This is where to start</h4>
                        </div>
                        <p>
                            For anyone who wants to set up a website to make extra income but doesn't know the first thing
                            about how to go about it, then this is where to start. <a ng-href="#/">Read more</a>
                        </p>
                        <br>
                        <span>Emily McKay</span> <span>USA</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="second-grid-box">
                        <div class="testimonials-img">
                            <img ng-src="{{ asset('images/testimonials-img-1.png') }}" alt="Testimonials Img 1" >
                            <h4>Making well over $1000 a day</h4>
                        </div>
                        <p>
                            I've been an Affilorama member since 2006 and I've learnt so much during my time here. I'm now
                            consistently making well over $1000 a day now, and last week I made $23,804! It's unstoppable
                            now! <a ng-href="#/">Read more</a>
                        </p>
                        <br>
                        <span>Fransisco Brevoort</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="second-grid-box test-last-part mt-50">
                        <div class="testimonials-img ">
                            <img ng-src="{{ asset('images/testimonials-img-2.png') }}" alt="Testimonials Img 2" >
                            <h4>I owe my success to Startup </h4>
                        </div>
                        <p>
                            It is from using what I learned here that I've managed to earn a full-time income and live life
                            on my own terms. I owe every last ounce of my success to Affilorama. This has really changed my
                            life for the better. Read more <a ng-href="#/">Read more</a>
                        </p>
                        <br>
                        <span>Clayton Terao</span> <span>USA</span>
                    </div>
                </div>

            </div>
            <div class="show-more-btn ">
                <a class="hvr-sweep-to-bottom " ng-href="#/">SHOW MORE MEMBERS</a>
            </div>

        </div>
    </div>
</div>
<!-------------- Testimonials block end -------------->


<!-------------- Check out block start -------------->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="check-out">Check Out Our Advanced Affiliate Training & Tools:</h2>
        </div>
    </div>
</div>
<div class="home-check-out-block">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="checkout-left-img">
                    <img ng-src="{{ asset('images/check-out-img.png') }}" alt="check Out Img" >
                    <img class="check-menu" ng-src="{{ asset('images/advacndeedMenu.jpg') }}" alt="advacndeed Menu" >
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="checkout-cup-part">
                    <img class="cup-img" ng-src="{{ asset('images/cup-img.png') }}" alt="Cup Img" >
                    <div class="checkout-cup-content">
                        <img ng-src="{{ asset('images/page-budy-logo.png') }}" alt="Page Budy Logo" >
                        <p>Easy Drag & Drop Pages in minutes You’ll get immediate access to our communities Site
                            Builder. It
                            includes pre-built templates from our community.</p>
                        <p>It will serve You well for Online Marketing, Affiliate, Lead Generation and website
                            promotional</p>
                    </div>
                    <a ng-href="#/" class="hvr-underline-from-right">LEARN MORE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------- Check out block end -------------->
<!-------------- Second check out block start -------------->
<div class="container">
    <div class="home-second-check-out-block">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="check-out-block-left-side">
                    <div class="laptop-logo">
                        <img ng-src="{{ asset('images/laptop-logo-blue.png') }}" alt="Laptop Logo Blue" >
                    </div>
                    <p>
                        Manage your revenue generation, website analytics, SEO, PPC and social campaigns, all in one
                        place
                        with our latest online application.
                        We've found you profitable niches, powerful keywords, quality content and stunning graphics. Now
                        just put it together, turn it on, and start earning.
                    </p>
                    <a ng-href="#/" class="">LEARN MORE</a>
                </div>
            </div>
            <div class="col-md-7 col-md-offset-1 col-sm-12">
                <div class="checkout-right-img">
                    <img ng-src="{{ asset('images/check-out-img2.png') }}" alt="Check Out Img" >
                    <h1>Learn <br> how to <br> make <br> money <br> online </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------- Second check out block start -------------->
<div class="container">
    <section id="demo">

        <article class="white-panel">

            <div class="social-bar-active-first">
                <div class="social-bar">
                    <div class="social-bar-active">
                        <div class="social-bar-active-header">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <h6>Travelling Entrepreneurs</h6>
                            <p>.5 hrs</p>
                            <h6>Game of Thrones meets Travelling Entrepreneurs </h6>
                        </div>
                        <div class="socal-bar-img">
                            <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 1" >
                        </div>
                    </div>
                </div>
            </div>

        </article>

        <article class="white-panel">

            <div class="social-bar">
                <div class="soc-bar">
                    <div class="socal-bar-img">
                        <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 2" >
                    </div>
                    <p>45 likes<span>1d</span></p>
                </div>
            </div>

        </article>

        <article class="white-panel">
            <div class="social-bar">
                <div class="social-bar-followers">
                    <div class="bottom-group">
                        <span>Instagram</span>
                        <button>Follow</button>
                    </div>
                    <ul>
                        <li>
                            <a ng-href="javascript:void(0)">
                                161 posts
                            </a>
                        </li>
                        <li>
                            <a ng-href="javascript:void(0)">
                                2,341 followers
                            </a>
                        </li>
                        <li>
                            <a ng-href="javascript:void(0)">
                                1,002 following
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="soc-bar">
                    <div class="socal-bar-img">
                        <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 3" >
                    </div>
                    <p>45 likes<span>1d</span></p>
                </div>
            </div>

        </article>

        <article class="white-panel">
            <div class="social-bar">
                <div class="soc-bar">
                    <div class="socal-bar-img">
                        <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 4" >
                    </div>
                    <p>45 likes<span>1d</span></p>
                </div>
            </div>

        </article>

        <article class="white-panel">
            <div class="social-bar">
                <div class="socal-bar-img">
                    <img ng-src="{{ asset('images/crop.png') }}" alt="crop" >
                </div>
            </div>

        </article>

        <article class="white-panel">
            <div class="social-bar">
                <div class="social-bar-active">
                    <div class="social-bar-active-header">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <h5>Travelling Entrepreneurs</h5>
                        <p>.5 hrs</p>
                        <h6>Game of Thrones meets Travelling Entrepreneurs </h6>
                    </div>
                    <div class="socal-bar-img">
                        <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 5" >
                    </div>
                </div>
            </div>

        </article>

        <article class="white-panel">

            <div class="social-bar">
                <div class="soc-bar">
                    <div class="socal-bar-img">
                        <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 6" >
                    </div>
                    <p>45 likes<span>1d</span></p>
                </div>
            </div>
        </article>

        <article class="white-panel">
            <div class="social-bar">
                <div class="social-bar-active">
                    <div class="social-bar-active-header">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <h5>Travelling Entrepreneurs</h5>
                        <p>.5 hrs</p>
                        <h6>Game of Thrones meets Travelling Entrepreneurs </h6>
                    </div>
                    <div class="socal-bar-img">
                        <img ng-src="{{ asset('images/forSocial.png') }}" alt="For Social 7" >
                    </div>
                </div>
            </div>

        </article>
    </section>
</div>