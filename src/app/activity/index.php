<?php

    $title = "DailyFit — Activité";
    require_once "../../components/header.php";
    if(!isset($_SESSION["user"])) {
        header("Location: ../index.php");
    }
    $user = $_SESSION["user"];

?>

    <div class="flex justify-center">
        <div class="mt-24">
            <h1 class="text-3xl font-bold mb-8">Welcome, <?= $user["firstname"] . " " . $user["lastname"] . " !" ?></h1>
            <?php if(date("l") == "Sunday") {
                ?>
                    <div class="w-full max-w-xl mx-auto mt-10">
                        <div class="grid grid-cols-7 gap-4 text-center border-b border-gray-500 pb-2">
                            <div class="text-lg text-gray-500">Lu</div>
                            <div class="text-lg text-gray-500">Mar</div>
                            <div class="text-lg text-gray-500">Mer</div>
                            <div class="text-lg text-gray-500">Jeu</div>
                            <div class="text-lg text-gray-500">Ven</div>
                            <div class="text-lg text-gray-500">Sam</div>
                            <div class="text-lg text-gray-500">Dim</div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 mt-4 text-center">
                            <div class="border-r border-r-4 border-r-4 border-gray-400">1</div>
                            <div class="border-r border-r-4 border-r-4 border-gray-400">2</div>
                            <div class="border-r border-r-4 border-r-4 border-gray-400">3</div>
                            <div class="border-r border-r-4 border-r-4 border-gray-400">4</div>
                            <div class="border-r border-r-4 border-r-4 border-gray-400">5</div>
                            <div class="border-r border-r-4 border-r-4 border-gray-400">6</div>
                            <div>7</div>
                        </div>
                    </div>
                <?php
            }?>
            <div class="flex justify-center mt-16">
                <div>
                    <input type="checkbox">
                    <br>
                    <textarea class="border border-2 border-gray-400 hidden" name="textarea"></textarea>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../../../src/scripts/activityCheckbox.js"></script>
<?php
    require_once "../../components/header.php";

?>