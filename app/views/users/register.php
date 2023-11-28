<?php /** @var array $data */ ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/index/style.css"/>
    <title>Register</title>
</head>

<body>
<form action="<?= URLROOT ?>/users/register" method="post">
    <div class="header"></div>
    <div class="signup">
        <h1 class="signup_title">Sign up to muzic-weeb</h1>

        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Username</label>
                <input type="text" id="txtusername" name="username" placeholder="Username"
                       value="<?= $data['username'] ?>"/>
                <?php if (!empty($data['username_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['username_error'] ?></span>
                <?php endif; ?>
            </div>
            <div class="formusername flex">
                <label for="txtemail">Email</label>
                <input type="text" id="txtemail" name="email" placeholder="Email" value="<?= $data['email'] ?>"/>
                <?php if (!empty($data['email_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['email_error'] ?></span>
                <?php endif; ?>
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Create a password</label>
                <input type="password" id="txtpassword" name="password" placeholder="Create a password"
                       value="<?= $data['password'] ?>"/>
                <?php if (!empty($data['password_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                <?php endif; ?>
            </div>
            <!-- <div class="formremember">
          <input type="checkbox" name="" id="Rememberme" />
          <label for="Rememberme">Remember me</label>
        </div> -->
            <!--            <input type="submit" name="submit" value="Sign Up"/>-->
            <button type="submit">Sign Up</button>
        </div>
        <div class="footer">
            <!-- <a href="#">Forgot your password?</a> -->
            <hr/>
            <p>Have an account?<a href="<?= URLROOT ?>/users/login"> Log in.</a></p>
        </div>
    </div>
</form>

</body>

</html>