<?php
class User {
    private static function connect() {
        return new PDO("mysql:host=localhost;dbname=game_inventory;charset=utf8", "root", "");
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