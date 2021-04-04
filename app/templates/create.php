<?php

require "../models/User.php";

session_start();
if(!isset($_SESSION['login'])) {
header('Location:' . 'login.php');
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $userCheck = new User();
    $userCheck = $userCheck->getUserByUsername($username);

    if($userCheck['username'] == null){
        $insert = new User();
        $insert->addUser($username, $password);
        echo "<p class='confirmed'> New user added correctly!</p>";
    } else {
        echo "<p class='alert'> That username already exists. Try another one.</p>";
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="./styles/views_forms.css">
    </head>

    <body>
        <nav class='navbar'>
            <img src="../assets/stampymail.png" class='logo' alt="logo"/>
            <h1 class='title'>Crud & login</h1>
            <p class='nav_button' onclick="window.location.href='logout.php' ">Sign out</p>
        </nav>

        <div class='container'>

            <a class='goback_button' href="index.php">
                <img src="../assets/left-arrow.svg" class='goback_img' alt="add"/>
                go back
            </a>

            <h2 class='subtitle'>Add a new user</h2>

            <form class='form' method="post">
                    <label for="username" class='label'>Username</label>
                    <input name="username" type="text" id="username" class='input' required>

                    <label for="password" class='label'>Password</label>
                    <input name="password" type="password" id="password" class='input' required>

                <button type="submit" name="submit" value="Submit" class='button'>CREATE</button>
            </form>
        </div>
</body>

</html>