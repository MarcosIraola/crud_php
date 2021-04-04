<?php
require "../models/User.php";

session_start();
if(!isset($_SESSION['login'])) {
header("Location:" . "login.php");
}
?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./styles/index.css" >
</head>

<body>
    <nav class='navbar'>
        <img src="../assets/stampymail.png" class='logo' alt="logo"/>
        <h1 class='title'>Crud & login</h1>
        <p class='nav_button' onclick="window.location.href='logout.php' ">Sign out</p>
    </nav>
    
    <div class='container'>
    
        <a class='add_button' href="create.php">
            <img src="../assets/plus.svg" class='add_img' alt="add"/>  
            New User
        </a>

        <table class='table_users'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th colspan='2'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $s = new User();
                $users = $s->getUsers();
                foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id']; ?> </td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['password']; ?></td>
                        <td>
                            <div>
                                <button class='action_button' onclick="window.location.href= 'edit.php?id=<?= $user['id'];?>' ">Edit</button>
                                <button class='action_button' onclick="window.location.href= 'delete.php?id=<?= $user['id']; ?>' ">Delete</button>
                            </div>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>