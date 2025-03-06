<?php
session_start();

$registered = isset($_SESSION['username']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    setcookie('username', '', time() - 3600, '/');
    setcookie('avatar', '', time() - 3600, '/');
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div id="main">
            <?php if(isset($_COOKIE['username'])) { ?>
                <h1>Welcome to Pairs</h1>
                <a href="pairs.php">Click here to play</a>
                <form method="POST">
                    <button type="submit" name="unregister">unregister</button>
                </form>
            <?php } else { ?>
                <h1>You're not using a registered session? <a href="registration.php">Register now</a></h1>
            <?php } ?>

        </div>
    </body>
</html>