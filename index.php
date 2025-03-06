<?php
session_start();

$registered = isset($_SESSION['username']);
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
            <?php } else { ?>
                <h1>You're not using a registered session? <a href="registration.php">Register now</a></h1>
            <?php } ?>

        </div>
    </body>
</html>