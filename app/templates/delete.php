<?php
require "../models/User.php";

session_start();
if(!isset($_SESSION['login'])) {
header("Location:" . "login.php");
}

if (isset($_GET['id'])) {
    $user = new User();
    $result = $user->deleteUser($_GET['id']);
    $_SESSION["delete"] = ["type" => "danger", "message" => "Event successfully deleted"];
header("Location:" . "index.php");
} else {
    echo "Something went wrong!";
    exit;
}