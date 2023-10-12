<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/index/style.css" />
    <title>Register</title>
</head>

<body>
    <div class="header"></div>
    <div class="signup">
        <h1 class="signup_title">Sign up to NHAC</h1>

        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Username</label>
                <input type="text" id="txtusername" placeholder="Username" />
            </div>
            <div class="formusername flex">
                <label for="txtemail">Email</label>
                <input type="text" id="txtemail" placeholder="Email" />
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Create a password</label>
                <input type="password" id="txtpassword" placeholder="Create a password" />
            </div>
            <!-- <div class="formremember">
          <input type="checkbox" name="" id="Rememberme" />
          <label for="Rememberme">Remember me</label>
        </div> -->
            <button type="submit">Sign Up</button>
        </div>
        <div class="footer">
            <!-- <a href="#">Forgot your password?</a> -->
            <hr />
            <p>Have an account?<a href="<?= URLROOT ?>/users/login"> Log in.</a></p>
        </div>
    </div>
</body>

</html>