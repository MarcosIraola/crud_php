<?php

require "../models/User.php";

session_start();
if(!isset($_SESSION['login'])) {
header("Location:" . "login.php");
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_GET['id'];

    $userCheck = new User();
    $userCheck = $userCheck->getUserByUsername($username);

    if($userCheck['username'] == null || $id == $userCheck['id']){
        $update = new User();
        $update->editUser($id, $username, $password);
        echo "<p class='confirmed'> User updated correctly!</p>";
    } else {
        echo "<p class='alert'> That username is already taken. Try another one.</p>";
    }
}

if (isset($_GET['id'])) {
    $user = new User();
    $result = $user->getUserById($_GET['id']);
} else {
    echo "Something went wrong!";
    exit;
}

?>

<!DOCTYPE html>
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

        <h2 class='subtitle'>Edit user</h2>

        <form class='form' method="post">
            <label for="username" class='label'>Username</label>
            <input name="username" class='input' type="text" id="username" value=<?=$result['username'] ?>>

            <label for="password" class='label'>Password</label>
            <input name="password" class='input' type="password" id="password" placeholder='Enter new password' required>

            <button type="submit" name="submit" value="Submit" class='button'>UPDATE</button>
        </form>
    </div>
</body>