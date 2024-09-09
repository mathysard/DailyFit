<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family : Poppins, sans-serif;
            background-color: #eeeeee;
        }
    </style>
    <link rel="shortcut icon" type="png" href="../../../../../src/assets/transparent_icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:wght@600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="../scripts/header.js"></script>
</head>
<body class="bg-[#eeeeee]">
    <nav class="bg-white fixed w-full z-20 top-0 start-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="../../../../../src/app/index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="../../../../../src/assets/transparent_icon.png" class="h-8">
        </a>
        <?php if(!isset($_SESSION["user"])) {
            ?>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="../../../../../src/app/authentification/form.php"><button id="loginButton" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button></a>
            </div>
            <?php
        } else {
            ?>
            <img src="https://media.tarkett-image.com/large/TH_25094225_25187225_001.jpg" width="32" height="32" class="rounded-full hover:cursor-pointer h-fit">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-2 my-auto size-6 hover:cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            <?php
        }?>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white text-black">
                <li>
                    <a href="#" id="homepage" class="block py-2 px-3 bg-blue-700 rounded md:bg-transparent md:p-0 md:dark:hover:text-blue-500 hover:underline">Homepage</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 hover:underline">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 hover:underline">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>