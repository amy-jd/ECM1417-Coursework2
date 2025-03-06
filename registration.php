<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $_SESSION['username'] = $username;
    setcookie("username", $username, time() + (86400 * 30), "/");

    $avatar = $_POST['avatar'];
    $_SESSION['avatar'] = $avatar;
    setcookie("avatar", $avatar, time() + (86400 * 30), "/");
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div id="main">
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Enter Name">
                <select name="avatar">
                    <option value="🤖">🤖 grrr</option>
                    <option value="🐱">🐱 meow</option>
                </select>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>