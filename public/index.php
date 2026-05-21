<?php
session_start();

require_once __DIR__ . '/../controllers/AuthController.php';
require_once __DIR__ . '/../controllers/ItemController.php';

$page = $_GET['page'] ?? (isset($_SESSION['user']) ? 'items' : 'login');
switch($page) {
    case 'register': (new AuthController())->register(); break;
    case 'logout': (new AuthController())->logout(); break;
    case 'items': (new ItemController())->list(); break;
    case 'add-item': (new ItemController())->add(); break;
    case 'edit-item': (new ItemController())->edit(); break;
    case 'delete-item': (new ItemController())->delete(); break;
    default: (new AuthController())->login(); break;
}