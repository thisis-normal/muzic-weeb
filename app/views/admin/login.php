<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/admin/style.css">
    <title>Login</title>
</head>

<body>
<form action="<?=URLROOT?>/backend/login" method="post">
    <div class="header"></div>
    <div class="login">
        <h1 class="login_title">Log in to Admin</h1>
        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Username</label>
                <input type="text" id="txtusername" placeholder="Username"  name="username"/>
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" placeholder="Password" name="password" />
            </div>
            <!-- <div class="formremember">
          <input type="checkbox" name="" id="Rememberme" />
          <label for="Rememberme">Remember me</label>
        </div> -->
            <button type="submit">Log In</button>
        </div>
        <!-- <div class="footer">
        <a href="#">Forgot your password?</a>
        <hr />
        <p>Don't have an account?<a href="#"> Sign up</a></p>
      </div> -->
    </div>
</form>

</body>

</html>