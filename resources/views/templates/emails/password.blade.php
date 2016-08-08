{{--Click here to reset your password: <a href="{{ url('/') . '#/password/reset/' . $token }}">{{  url('/') . '#/password/reset/' . $token }}</a>--}}
        <!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div style="background: rgba(0,0,0,0.7); width: 50%;min-height: 500px;margin: 0 auto; padding: 20px;">
    <img alt="Login Logo" src="http://laptopstartup.com/images/logo.png" style="position: absolute;margin-left: 250px;margin-top: -20px;">
    <div style="background: rgb(255,255,255); margin: 0 auto;margin-top: 53px; padding: 20px;text-align: center;">
        <h1>Password Reset</h1>
        <div>
            <h2> Reset your password, complete this form: <a href="{{ url('/') . '#/password/reset/' . $token }}">Reset</a>.</h2>
        </div>
    </div>
</div>
</body>
</html>