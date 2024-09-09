<?php

require_once "../../classes/User.php";
require_once "../../classes/Database.php";

$userClass = new User($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"], "../index.php", "./form.php?error=1&message=Le mot de passe est mauvais");
$dbClass = new Database();

if($_POST["state"] == "Login") {
    $user->login();
} elseif($_POST["state"] == "Register") {
    $user->register();
    header("Location: ./form.php?state=Login");
} else {
    header("Location: ./form.php?error=2&message=Mauvais état");
}