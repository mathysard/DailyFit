<?php
    $title = "DailyFit — A tracker for your daily sport.";
    require_once "../components/header.php";
    require_once "../classes/User.php";
    if(isset($_SESSION["user"])) {
        $user = new User($_SESSION["user"]["firstname"], $_SESSION["user"]["lastname"], $_SESSION["user"]["email"], $_SESSION["user"]["password"], "", "", "", "", "");
    } else {
        $user = new User("", "", "", "", "", "", "", "", "");
    }
    $userCount = $user->countUsers();
?>

<div class="flex justify-center text-center">
    <div>
        <h1 class="text-3xl font-bold mt-24 mb-8">DailyFit</h1>
        <img src="../assets/DailyFit.png" class="mx-auto mb-8 border-2 border-gray-400" width="400">
        <p class="text-gray-600 text-lg w-11/12 mx-auto font-medium mb-12">Welcome to DailyFit, your first-choice personal fitness companion for tracking your daily progress and reaching your health goals. Whether you're a seasoned athlete or just starting your fitness journey, DailyFit is here to help you stay motivated and keep an eye on your physical activities.</p>
        <?php if($userCount["count"] < 2) {
            ?>
                <span class="text-3xl font-bold"><?= $userCount["count"] ?></span><br><p class="text-xl font-semibold">user trust us to keep track of their activity.</p>
            <?php
        } else {
            ?>
            <span class="text-3xl font-bold"><?= $userCount["count"] ?></span><br><p class="text-xl font-semibold">users trusts us to keep track of their activity.</p>
            <?php
        }?>
    </div>
</div>

<?php
    require_once "../components/footer.php";
?>