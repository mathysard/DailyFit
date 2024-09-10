<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/src/classes/Database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/src/classes/User.php";

$user = $_SESSION["user"]; 

$db = new Database();
$user = new User($user["firstname"], $user["lastname"], $user["email"], $user["password"], "", "", "", "", "");

class Activity {

    private $db;
    private $description;
    private $id;
    
    public function __construct($description, $id) {
        $this->db = $db->database();
        $this->description = $description;
        $this->id = $id;
    }

    public function create() {
        if($description == NULL) {
            $stmt = $this->db->prepare("INSERT INTO daily_activity(is_done, user_id) VALUES(?, ?)");
            $stmt->execute(["Yes", $user["id"]]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO daily_activity(is_done, description, user_id) VALUES(?, ?, ?)");
            $stmt->execute(["Yes", $this->description, $user["id"]]);
        }
    }

    public function show() {
        $stmt = $this->db->prepare("SELECT * FROM daily_activity WHERE user_id = ?");
        $stmt->execute([$user["id"]]);
        $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $activities;
    }

    public function update() {
        $stmt = $this->db->prepare("UPDATE daily_activity SET description = ? WHERE id = ?");
        $stmt->execute([$this->description, $this->id]);
    }

    public function getActivitiesFromWeek() {
        $dates = [];
        $results = [];
        
        for ($i = 0; $i <= 6; $i++) {
            $dates[] = date("Y-m-d", strtotime("-$i days"));
        }

        foreach ($dates as $date) {
            $stmt = $this->db->prepare("SELECT * FROM daily_activity WHERE date = ?");
            $stmt->execute([$date]);
            $activity = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if ($activity) {
                $results[$date] = $activity;
            } else {
                $results[$date] = null;
            }
        }
        
        return $results;
    }        
}
?>