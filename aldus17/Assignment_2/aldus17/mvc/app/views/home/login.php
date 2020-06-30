<!DOCTYPE html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo DOC_ROOT; ?>/css/index_page_style.css">
    <?php include_once '../app/views/partials/head.php'; ?>
</head>

<body>
    <form method="POST" action="/aldus17/mvc/public/home/login" id="loginForm">
        <div id="inner_login_form_container">
            <div class="form-group">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
                <small id="usernameHelp" class="form-text text-muted">Never share your password with anyone</small>
            </div>
            <div class="form-group">
                <label for="password"><i class="fas fa-key"></i> Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary" id="loginbtn">login</button>
            <a href="/aldus17/mvc/public/home/register" class="btn btn-primary" role="button" aria-pressed="true">Register</a>
        </div>
        <?php if (isset($_SESSION['ErrorMsg'])) {
            echo $_SESSION['ErrorMsg'];
            $_SESSION['ErrorMsg'] = null;
        } ?>
    </form>

</body>

</html>