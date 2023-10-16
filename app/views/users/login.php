<?php /** @var array $data */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/index/style.css"/>
    <title>Login</title>
</head>

<body>
<form action="<?= URLROOT ?>/users/login" method="post">
    <div class="header">
        <h1 style="color: #1fdf64; text-align: center"><?php flash('register_success') ?></h1>
    </div>
    <div class="login">
        <h1 class="login_title">Log in to NHAC</h1>
        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Email or username</label>
                <input type="text" id="txtusername" name="username_or_email" placeholder="Email or username"
                       value="<?= $data['username_or_email'] ?>"/>
                <?php if (!empty($data['username_or_email_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['username_or_email_error'] ?></span>
                <?php endif; ?>
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" name="password" placeholder="Password"
                       value="<?= $data['password'] ?>"/>
                <?php if (!empty($data['password_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                <?php endif; ?>
            </div>
            <div class="formremember">
                <input type="checkbox" name="" id="Rememberme"/>
                <label for="Rememberme">Remember me</label>
            </div>
            <button type="submit">Log In</button>
        </div>
        <div class="footer">
            <a href="<?=URLROOT?>/users/forgot-password">Forgot your password?</a>
            <hr/>
            <p>Don't have an account?<a href="<?= URLROOT ?>/users/register">Sign up</a></p>
        </div>
    </div>
</form>

</body>

</html>