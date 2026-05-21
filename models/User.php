<?php
class User {
    private static function connect() {
        $host = getenv('MYSQLHOST') ?: 'localhost';
        $port = getenv('MYSQLPORT') ?: '3306';
        $user = getenv('MYSQLUSER') ?: 'root';
        $pass = getenv('MYSQLPASSWORD') ?: '';
        $dbname = getenv('MYSQLDATABASE') ?: 'game_inventory';
        
        return new PDO(
            "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8",
            $user,
            $pass,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public static function findByUsername($username) {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function register($username, $password, $role = 'staff') {
        $db = self::connect();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $hash, $role]);
    }
}