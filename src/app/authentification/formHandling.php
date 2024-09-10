<?php

require_once "../../classes/User.php";
require_once "../../classes/Database.php";

$firstname = htmlspecialchars(trim($_POST["firstname"]));
$lastname = htmlspecialchars(trim($_POST["lastname"]));
$email = htmlspecialchars(trim($_POST["email"]));
$password = htmlspecialchars(trim($_POST["password"]));

$user = new User($firstname, $lastname, $email, $password, "../index.php", "./form.php?error=1&message=Wrong password", "./form.php?error=3&message=Non-accepted picture format", "../../assets/profile_picture/", "./form.php?error=9&message=This account is deleted");
$database = new Database();

if($_POST["state"] == "Login") {
    $verifyPassword = htmlspecialchars(trim($_POST["vPassword"]));
    if($email == $user->getUser()["email"]) {
        if($password == $verifyPassword) {
            $user->login();
            header("Location: ../index.php");
        } else {
            header("Location: ./form.php?error=7&message=Verify password doesn't match password&state=Login");
        }
    } else {
        header("Location: ./form.php?error=8&message=User doesn't exist&state=Login");
        // var_dump($user->getUser()["email"]);
    }
} elseif($_POST["state"] == "Register") {
    if($firstname !== "" && $lastname !== "" && $email !== "" && $password !== "") {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($email !== $user->getUser()) {
                $user->register();
                header("Location: ./form.php?state=Login");
            } else {
                header("Location: ./form.php?error=4&message=E-mail is already taken");
            }
        } else {
            header("Location: ./form.php?error=5&message=Wrong mail format");
        }
    } else {
        header("Location: ./form.php?error=6&message=Please fulfill all the fields that requires text");
    }
} else {
    header("Location: ./form.php?error=2&message=Wrong state");
}