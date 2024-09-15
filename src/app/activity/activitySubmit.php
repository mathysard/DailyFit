<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ./index.php?error=9&message=Session non-active");
}

require_once "../../classes/Activity.php";

$description = htmlspecialchars($_POST["textarea"]);

// if(isset($_GET["id"])) {
//     $id = $_GET["id"];
//     $activity = new Activity($description, $id, $_SESSION["user"]);
// } else {
//     $activity = new Activity($description, "", $_SESSION["user"]);
// }

$activity = new Activity($description, "");

// if($description !== "") {
//     if(isset($_GET["id"])) {
//         $activity->update();
//         header("Location: ./index.php");
//     } else {
//         $activity->create();
//         header("Location: ./index.php");
//     }
// }

if($description !== "") {
    $activity->create();
    header("Location: ./index.php");
}