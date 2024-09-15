<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/src/classes/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/src/classes/User.php";

$user = new User($_SESSION["user"]["firstname"], $_SESSION["user"]["lastname"], $_SESSION["user"]["email"], $_SESSION["user"]["password"], "", "", "", "", "");

class Activity {
    
    private $db;
    private $description;
    // private $id;
    
    // public function __construct($description, $id) {
    //     $db = new Database();
    //     $this->db = $db->database();
    //     $this->description = $description;
    //     $this->id = $id;
    // }

    public function __construct($description) {
        $db = new Database();
        $this->db = $db->database();
        $this->description = $description;
    }

    public function create() {
        if($description == NULL) {
            $stmt = $this->db->prepare("INSERT INTO daily_activity(is_done, user_id, created_at, created_by) VALUES(?, ?, ?, ?)");
            $stmt->execute(["Yes", $_SESSION["user"]["id"], date("Y-m-d"), $_SESSION["user"]["id"]]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO daily_activity(is_done, description, user_id, created_at, created_by) VALUES(?, ?, ?, ?, ?)");
            $stmt->execute(["Yes", $this->description, $_SESSION["user"]["id"], date("Y-m-d"), $_SESSION["user"]["id"]]);
        }
    }

    // public function update() {
    //     $stmt = $this->db->prepare("UPDATE daily_activity SET description = ?, updated_at = ?, updated_by = ? WHERE id = ?");
    //     $stmt->execute([$this->description, date("Y-m-d H:i:s"), $_SESSION["user"]["id"], $this->id]);
    // }

    public function getActivitiesFromWeek() {
        $dates = [];
        $results = [];
        
        for ($i = 0; $i <= 6; $i++) {
            $dates[] = date("Y-m-d", strtotime("-$i days"));
        }

        $dates = array_reverse($dates);

        foreach ($dates as $date) {
            $stmt = $this->db->prepare("SELECT * FROM daily_activity WHERE created_at = ? AND user_id = ?");
            $stmt->execute([$date, $_SESSION["user"]["id"]]);
            $activity = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($activity) {
                $results[$date] = $activity["created_at"];
            } else {
                $results[$date] = null;
            }
        }
        
        return $results;
    }

    public function getActivityByDate() {
        $stmt = $this->db->prepare("SELECT * FROM daily_activity WHERE created_at = ? AND user_id = ?");
        $stmt->execute([date("Y-m-d"), $_SESSION["user"]["id"]]);
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);
        return $activity;
    }
}
?>