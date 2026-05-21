<?php
require_once __DIR__ . '/../models/User.php';

class AuthController
{
    public function login() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = User::findByUsername($_POST['username']);
            if ($user && password_verify($_POST['password'], $user['password'])) {
                session_regenerate_id();
                $_SESSION['user'] = ['id' => $user['id'], 'username' => $user['username'], 'role'=>$user['role']];
                header("Location: index.php?page=items");
                exit;
            } else {
                $error = "Invalid credentials";
            }
        }
        include __DIR__ . '/../views/auth/login.php';
    }

    public function register() {
        $error = null;
        $success = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (User::findByUsername($_POST['username'])) {
                $error = "Username already taken!";
            } else {
                $ok = User::register($_POST['username'], $_POST['password'], 'staff');
                $success = $ok ? "Registration successful. You can login now!" : "Registration failed!";
            }
        }
        include __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}