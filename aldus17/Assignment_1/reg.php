<!DOCTYPE html>

<head>
    <title>Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="register_form_wrapper">
        <form method="post" onsubmit="return checkForm();" oninput="return checkForm()">
            <h1>Registration</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="fullname" id="fullname-label">Forname and lastname: </label>
            <input type="text" name="fullname" id="fullname" title="Please enter your first and lastname" placeholder="Type forname and lastname" required>

            <label for="password" id="password-label">Password: </label>
            <input type="password" name="password" id="password" placeholder="Type password" required>
            <br>

            <input type="submit" class="submitbtn" name="submitbtn" value="Submit"></input>
        </form>
    </div>
</body>

<script src="js/formCheck.js"></script>