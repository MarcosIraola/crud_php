<?php
require '../models/User.php';

session_start();
if(isset($_SESSION['login'])) {
    header('Location:' . 'index.php');
    die();
}

if(isset($_POST['submit'])){
    $username = strtolower($_POST['username']);
    $user = new User();
    $user = $user->getUserByUsername($username);

    if ($username == $user['username'] && password_verify($_POST['password'], $user['password'])){
        $_SESSION['login'] = [true]; 
        header('Location:' . 'index.php');
        die();
    } else {
        echo "<p class='alert'> Username or password incorrect. Please try again.</p>";
    };
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./styles/views_forms.css" >
    </head>
    <body>

    <nav class='navbar'>
        <img src='../assets/stampymail.png' class='logo' alt='logo'/>
        <h1 class='title'>Crud & login</h1>
        <p class='nav_button' onclick="window.location.href='register.php' ">Register</p>
    </nav>

    <h2 class='first_title'>¡Welcome!</h2>
    
    <h2 class='subtitle'>Login</h3>

    <form action='' method='post' class='form'>
        <label class='label' for='username'>Username</label>
        <input class='input' type='text' id='username' name='username' required>      

        <label class='label' for="password">Password</label>
        <input class='input' type='password' id='password' name='password'>
      <button type='submit' class='button' value="Submit" name='submit'>Login</button>
    </form>

  </body>

</html>