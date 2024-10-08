<?php

$title = "DailyFit — Authentification";
require_once "../../components/header.php";
if(isset($_SESSION["user"])) {
    header("Location: ../index.php");
}

?>

<div class="flex justify-center h-screen items-center" id="register">
    <div>
        <form class="max-w-sm mx-auto" method="POST" action="./formHandling.php" enctype="multipart/form-data">
            <div class="mb-5">
                <label for="firstname" class="block mb-2 text-sm font-medium">Your first name</label>
                <input type="firstname" name="firstname" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your first name"/>
            </div>
            <div class="mb-5">
                <label for="lastname" class="block mb-2 text-sm font-medium">Your last name</label>
                <input type="text" name="lastname" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your last name"/>
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                <input type="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your mail"/>
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium">Your profile picture</label>
                <input type="file" name="image" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your mail"/>
                <p class="text-gray-600 text-sm text-center">Accepted format types : PNG, JPG, JPEG.</p>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium">Your password</label>
                <input type="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your password"/>
            </div>
            <div class="flex items-start justify-center mb-5">
                <label for="terms" class="text-sm font-medium text-gray-600 flex">Already have an account ?&nbsp;<p id="loginState" class="text-blue-600 hover:underline hover:cursor-pointer dark:text-blue-500">Login</p></label>
            </div>
            <input type="hidden" name="state" value="Register">
            <div class="flex justify-center">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</button>
            </div>
        </form>
    </div>
</div>

<div class="flex justify-center h-screen items-center hidden" id="login">
    <div>
        <form class="max-w-sm mx-auto" method="POST" action="./formHandling.php">
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium">Your email</label>
                <input type="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your mail"/>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium">Your password</label>
                <input type="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your password"/>
            </div>
            <div class="mb-5">
                <label for="vPassword" class="block mb-2 text-sm font-medium">Repeat password</label>
                <input type="password" name="vPassword" class="shadow-sm bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Enter your password again"/>
            </div>
            <div class="flex items-start justify-center mb-5">
                <label for="terms" class="text-sm font-medium text-gray-600 flex">No account ?&nbsp;<p id="registerState" class="text-blue-600 hover:underline hover:cursor-pointer dark:text-blue-500">Register</p></label>
            </div>
            <input type="hidden" name="state" value="Login">
            <div class="flex justify-center">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
            </div>
        </form>
    </div>
</div>

<script src="../../scripts/authentificationHandling.js"></script>
</body>
</html>