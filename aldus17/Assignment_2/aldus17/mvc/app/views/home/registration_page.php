<!DOCTYPE html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="<?php echo DOC_ROOT; ?>/css/registration_page_style.css">
    <?php include_once '../app/views/partials/head.php'; ?>
</head>

<body class="registerBody" id="registerBody" name="registerBody">

    <div class="register_form_wrapper">
        <form method="post" action="/aldus17/mvc/public/home/register" id="registerForm" onsubmit="return checkForm();return false; return validatePassword();" oninput="return checkForm()">
            <div class="inner_register_form_container" id="inner-register-form-container">

                <h1>Registration</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <div class="form-group">
                    <label for="username" id="username-label"><i class="fas fa-user-check" aria-hidden="true"></i> Username: </label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="type a username" required>
                </div>
                <div class="form-group">
                    <label for="fullname" id="fullname-label"><i class="fas fa-signature" aria-hidden="true"></i> Forname and lastname: </label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Type forname and lastname" required>
                </div>
                <div class="form-group">
                    <label for="email" id="email-label"><i class="fas fa-at" aria-hidden="true"></i> Email: </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="type email" required>
                </div>
                <div class="form-group">
                    <label for="password" id="password-label"><i class="fas fa-key" aria-hidden="true"></i> Password: </label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Type password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" required>
                </div>
                <span>Confirm password: </span> <span id="message"><i>Type to see if it matches</i></span>
                <div class="form-group">
                    <label for="password_confirm" id="password_confirm-label"><i class="fas fa-key" aria-hidden="true"></i> Confirm password</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Repeat password" oninput="return validatePassword();" onchange="return validatePassword();" required>
                    <br>
                </div>
                <button type="submit" name="registerbtn" id="registerbtn" class="btn btn-primary btn-lg">Create Account</button>
                <!-- <input type="submit" class="registerbtn" name="registerbtn" value="Create Account"></input> -->

                <p>
                    Already registered? <a href="/aldus17/mvc/public/home/">Go to signin page</a>
                </p>
            </div>
        </form>

    </div>

    <script src="<?php echo DOC_ROOT; ?>/js/formCheck.js"></script>
    <?php include_once '../app/views/partials/foot.php'; ?>