<?php

require "../models/User.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $userCheck = new User();
    $userCheck = $userCheck->getUserByUsername($username);

    if($userCheck['username'] == null){
        $insert = new User();
        $insert->addUser($username, $password);
        header("Location:" . "login.php");
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
            <p class='nav_button' onclick="window.location.href='login.php' ">Log in</p>
        </nav>

        <div class='container'>

            <h2 class='first_title'>Please</h2>

            <h2 class='subtitle'>Register</h2>

            <form class='form' method="post">
                    <label for="username" class='label'>Username</label>
                    <input name="username" type="text" id="username" class='input'>

                    <label for="password" class='label'>Password</label>
                    <input name="password" type="password" id="password" class='input'>

                <button type="submit" name="submit" value="Submit" class='button'>Register</button>
            </form>
        </div>
</body>

</html>