<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Eventify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
</head>
<body>
    <div class="login-container">
        <h2>Login to Eventify</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert" style="margin-bottom:1rem;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('login') ?>" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Enter your username" 
                    required 
                    autofocus
                >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password" 
                    required
                >
            </div>
            <button type="submit" class="login-btn">Sign In</button>
        </form>
        <div class="login-footer">
            &copy; <?= date('Y') ?> Eventify. All rights reserved.
        </div>
    </div>
</body>
</html>