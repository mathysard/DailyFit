<?php

    try {
        require_once "../../classes/Database.php";
    
        class User {

            public $db;

            public function __construct($firstname, $lastname, $email, $password, $successLocation, $failLocation) {
                $db = new Database();
                $this->pdo = $db->database();
                $this->firstname = $firstname;
                $this->lastname = $lastname;
                $this->email = $email;
                $this->password = $password;
                $this->successLocation = $successLocation;
                $this->failLocation = $failLocation;
            }
    
            public function register() {
                $stmt = $this->pdo->prepare("INSERT INTO users(firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
                $stmt->execute([$firstname, $lastname, $email, password_hash($password, PASSWORD_DEFAULT)]);
            }
    
            public function login() {
                $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if(password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = $user;
                    header("Location: $successLocation");
                } else {
                    header("Location: $failLocation");
                }
            }
    
            public function countUsers() {
                $stmt = $this->pdo->prepare("SELECT count('id') from USERS");
                $usersNumber = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $usersNumber;
            }
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>