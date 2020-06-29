<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$correctName = 'aleksander';
$correctPassword = '1234';

if (isset($_POST['name']) || isset($_POST['password'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if ($name == $correctName && $password == $correctPassword) {
        $_SESSION['logged_in'] = true;
        echo 'You have logged ind successfully';
    } else {
        $_SESSION['logged_in'] = false;
        echo 'Wrong name or password. Try again!';
    }
} else {
    $_SESSION['logged_in'] = false;
    echo 'Please enter name and password';
}

if ($_SESSION['logged_in']) : ?>
    <br />
    <form method='post'>
        <input type='submit' name='logout' id='logout' value='logout' />
    </form>
<?php else : ?>

    <form method='post'>
        <input name='name' placeholder='name' id='name' />
        <input name='password' type='password' placeholder='password' />
        <input type='submit' value='login' />
    </form>
<?php endif;
?>