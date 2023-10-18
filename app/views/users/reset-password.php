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
<form action="<?= URLROOT ?>/users/update-password" method="post">
    <div class="header"></div>
    <div class="signup">
        <h1 class="signup_title">Reset your password</h1> <br><br><br>
        <div class="form">
            <div class="formusername flex">
                <label for="txtusername">Enter new password</label>
                <input type="text" id="txtusername" name="password" placeholder="Enter new password"/>
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Confirm your password</label>
                <input type="password" id="txtpassword" name="confirm_password" placeholder="Confirm your password"/>
                <?php if (!empty($data['password_error'])) : ?>
                    <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                <?php endif; ?>
            </div>
            <?php if (!empty($data['email']) && !empty($data['token'])) : ?>
                <input type="hidden" name="email" value="<?=$data['email']?>">
                <input type="hidden" name="token" value="<?=$data['token']?>">
            <?php endif; ?>
            <button type="submit">Update password</button>
        </div>
    </div>
</form>
</body>
</html>