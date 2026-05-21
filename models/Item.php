<?php
class Item {
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

    public static function getAll($search = null) {
        $db = self::connect();
        if ($search) {
            $like = "%$search%";
            $stmt = $db->prepare("SELECT * FROM items WHERE title LIKE ? OR platform LIKE ? OR genre LIKE ?");
            $stmt->execute([$like, $like, $like]);
        } else {
            $stmt = $db->query("SELECT * FROM items");
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get($id) {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $db = self::connect();
        $stmt = $db->prepare("INSERT INTO items (title, platform, genre, price, quantity, description) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['title'], $data['platform'], $data['genre'], $data['price'], $data['quantity'], $data['description']
        ]);
    }

    public static function update($id, $data) {
        $db = self::connect();
        $stmt = $db->prepare("UPDATE items SET title=?, platform=?, genre=?, price=?, quantity=?, description=? WHERE id=?");
        return $stmt->execute([
            $data['title'], $data['platform'], $data['genre'], $data['price'], $data['quantity'], $data['description'], $id
        ]);
    }

    public static function delete($id) {
        $db = self::connect();
        $stmt = $db->prepare("DELETE FROM items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}