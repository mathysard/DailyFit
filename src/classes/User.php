<?php

    try {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/src/classes/Database.php";

        
        class User {
            
            private $db;
            private $firstname;
            private $lastname;
            private $email;
            private $password;
            private $successLocation;
            private $failLocation;
            private $failImageLocation;
            private $imageDirectory;
            private $loginNotActive;
            
            public function __construct($firstname, $lastname, $email, $password, $successLocation, $failLocation, $failImageLocation, $imageDirectory, $loginNotActive) {
                $db = new Database();
                $this->db = $db->database();
                $this->firstname = $firstname;
                $this->lastname = $lastname;
                $this->email = $email;
                $this->password = $password;
                $this->successLocation = $successLocation;
                $this->failLocation = $failLocation;
                $this->failImageLocation = $failImageLocation;
                $this->imageDirectory = $imageDirectory;
                $this->loginNotActive = $loginNotActive;
            }

            public function getUser() {
                $stmt = $this->db->prepare("SELECT email FROM users WHERE email = ?");
                $stmt->execute([$this->email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if($user !== NULL) {
                    return $user;
                } else {
                    return NULL;
                }
            }
    
            public function register() {
                if(isset($_FILES["image"])) {
                    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                    if($extension == "png" || $extension == "jpg" || $extension == "jpeg") {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $this->imageDirectory . $_FILES["image"]["name"]);
                        $stmt = $this->db->prepare("INSERT INTO users(firstname, lastname, email, image, password) VALUES (?, ?, ?, ?, ?)");
                        $stmt->execute([$this->firstname, $this->lastname, $this->email, $_FILES["image"]["name"], password_hash($this->password, PASSWORD_DEFAULT)]);
                    } else {
                        header("Location: " . $this->failImageLocation);
                    } 
                } else {
                    $stmt = $this->db->prepare("INSERT INTO users(firstname, lastname, email, image, password) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$this->firstname, $this->lastname, $this->email, "default_pfp.png", password_hash($this->password, PASSWORD_DEFAULT)]);
                }
            }
    
            public function login() {
                $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$this->email]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if(password_verify($this->password, $user["password"])) {
                    if($user["is_active"] == 1 && $user["status"] == "A") {
                        session_start();
                        $_SESSION["user"] = $user;
                        header("Location: " . $this->successLocation);
                    } else {
                        header("Location: " . $this->loginNotActive);
                    }
                } else {
                    header("Location: " . $this->failLocation);
                }
            }

            public function logout() {
                session_start();
                session_destroy();
            }
    
            public function countUsers() {
                $stmt = $this->db->query("SELECT count('id') AS `count` from USERS");
                $usersNumber = $stmt->fetch(PDO::FETCH_ASSOC);
                return $usersNumber;
            }

            public function delete() {
                $stmt = $this->db->prepare("UPDATE users SET is_active = 0, status = 'D' WHERE id = ?");
                $stmt->execute([$_SESSION["user"]["id"]]);
                session_destroy();
            }
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>