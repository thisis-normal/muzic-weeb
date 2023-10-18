<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= URLROOT ?>/public/css/index/style.css"/>
</head>
<body>
HELLo
    <?php if (!empty($data['error'])) : ?>
    <h1 style="color: red"><?= $data['error'] ?></h1>
    <?php endif; ?>
    <form action="" method="post">
    <div class="header">
        <h1 style="color: #1fdf64; text-align: center"><?php flash('register_success') ?></h1>
    </div>
    <div class="login">
        <h1 class="login_title">Reset password</h1>
        <div class="form">
            
            <div class="formpassword flex">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" name="password" placeholder="Password"value="">
                      
            </div>
            <div class="formpassword flex">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" name="password" placeholder="Password"
                       value="">
            </div>
           
            <button type="submit">Create</button>
        </div>
       
    </div>
</form>
</body>
</html>