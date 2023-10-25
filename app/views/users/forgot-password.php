<?php /** @var array $data */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/index/style.css"/>
    <title>Forgot password</title>
</head>

<body>
<form action="<?= URLROOT ?>/users/forgot-password" method="post">
    <div class="header">
        <h1 style="color: #1fdf64; text-align: center"><?php flash('sent_password_reset') ?></h1>
    </div>
    <div class="login">
        <br>
        <br>
        <h1 class="login_title">You forgot your password????</h1>
        <p>such an idiot! 😏</p>
        <span style="font-size: 10px;">just like me.</span>
        <br><br><br><br>
        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Email</label>
                <!--                value="--><?php //= $data['email'] ?><!--"-->
                <input type="text" id="txtusername" name="email" placeholder="Enter your fk email here" value="<?= $data['email']?>"/>
                <?php if (!empty($data['email_error'])) : ?>
                    <span style="color: red"><?= $data['email_error'] ?></span>
                <?php endif; ?>
            </div>
            <br><br><br>
            <button type="submit">Send Nuke Now</button>
        </div>
    </div>
</form>

</body>

</html>