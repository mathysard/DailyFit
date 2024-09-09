<?php

class Database {
    public function database() {
        return new PDO('mysql:host=localhost;dbname=dailyfit', 'publicuser', 'root');
    }
}