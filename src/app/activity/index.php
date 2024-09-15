<?php

    $title = "DailyFit — Activity";
    require_once "../../components/header.php";
    if(!isset($_SESSION["user"])) {
        header("Location: ../index.php");
    }
    $session = $_SESSION["user"];
    require_once "../../classes/Activity.php";
    $activity = new Activity("", "");
    if(date("l") == "Sunday") {
        $activitiesFromWeek = $activity->getActivitiesFromWeek();
    }

?>
    <div class="flex justify-center">
        <div class="mt-24">
            <h1 class="text-3xl font-bold mb-8">Welcome, <?= $session["firstname"] . " " . $session["lastname"] . " !" ?></h1>
            <?php if(date("l") == "Sunday") {
                if($activity->getActivityByDate() !== false) {
                ?>
                    <div class="w-full max-w-xl mx-auto mt-10">
                        <h1 class="text-2xl font-bold mb-8 text-center">Summary of the week !</h1>
                        <div class="grid grid-cols-7 gap-4 text-center border-b border-gray-500 pb-2">
                            <div class="text-lg text-gray-500">Mon</div>
                            <div class="text-lg text-gray-500">Tue</div>
                            <div class="text-lg text-gray-500">Wed</div>
                            <div class="text-lg text-gray-500">Thu</div>
                            <div class="text-lg text-gray-500">Fri</div>
                            <div class="text-lg text-gray-500">Sat</div>
                            <div class="text-lg text-gray-500">Sun</div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 mt-4 text-center">
                        <?php foreach($activitiesFromWeek as $dailyActivity) {
                            if($dailyActivity == null) {
                                ?>
                                <div class="border-r border-r-4 border-r-4 border-gray-400 text-red-500">X</div>
                                <?php
                            } else {
                                ?>
                                <div class="border-r border-r-4 border-r-4 border-gray-400 text-green-500">O</div>
                                <?php
                            }
                        }?>
                        </div>
                        
                    </div>
                <?php
                } elseif(date("H") >= 19 && $activity->getActivityByDate() == false) {
                    ?>
                    <div class="w-full max-w-xl mx-auto mt-10">
                        <h1 class="text-2xl font-bold mb-8 text-center">Summary of the week !</h1>
                        <div class="grid grid-cols-7 gap-4 text-center border-b border-gray-500 pb-2">
                            <div class="text-lg text-gray-500">Mon</div>
                            <div class="text-lg text-gray-500">Tue</div>
                            <div class="text-lg text-gray-500">Wed</div>
                            <div class="text-lg text-gray-500">Thu</div>
                            <div class="text-lg text-gray-500">Fri</div>
                            <div class="text-lg text-gray-500">Sat</div>
                            <div class="text-lg text-gray-500">Sun</div>
                        </div>
                        <div class="grid grid-cols-7 gap-2 mt-4 text-center">
                        <?php foreach($activitiesFromWeek as $dailyActivity) {
                            if($dailyActivity == null) {
                                ?>
                                <div class="border-r border-r-4 border-r-4 border-gray-400 text-red-500">X</div>
                                <?php
                            } else {
                                ?>
                                <div class="border-r border-r-4 border-r-4 border-gray-400 text-green-500">O</div>
                                <?php
                            }
                        }?>
                        </div>
                        
                    </div>
                <?php
                }
            }
            if($activity->getActivityByDate() == false) {
                ?>
                <div class="mt-16">
                    <form action="./activitySubmit.php" method="POST">
                        <div class="flex justify-center">
                            <input type="checkbox">
                        </div>
                        <br>
                        <div class="flex justify-center">
                            <textarea class="border border-2 border-gray-400 hidden" name="textarea" id="activityDescription"></textarea>
                        </div>
                        <br>
                        <div class="flex justify-center" id="activitySubmit"></div>
                    </form>
                </div>
                <?php
            } else {?>
                <div class="mt-16">
                   <div class="flex justify-center">
                        <input type="checkbox" checked disabled>
                    </div>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="../../../../../src/scripts/activityCheckbox.js"></script>
<?php
    require_once "../../components/footer.php";
?>