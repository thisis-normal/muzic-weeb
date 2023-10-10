<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="http://localhost/muzic-weeb/public/css/index/style.css" />
    <title>Login</title>
</head>

<body>
    <div class="header"></div>
    <div class="login">
        <h1 class="login_title">Log in to NHAC</h1>

        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Email or username</label>
                <input type="text" id="txtusername" placeholder="Email or username" />
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" placeholder="Password" />
            </div>
            <div class="formremember">
                <input type="checkbox" name="" id="Rememberme" />
                <label for="Rememberme">Remember me</label>
            </div>
            <button type="submit">Log In</button>
        </div>
        <div class="footer">
            <a href="#">Forgot your password?</a>
            <hr />
            <p>Don't have an account?<a href="#"> Sign up</a></p>
        </div>
    </div>
</body>

</html>