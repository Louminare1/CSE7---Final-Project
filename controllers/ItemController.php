<?php
require_once __DIR__ . '/../models/Item.php';

class ItemController
{
    public function list() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $search = $_GET['search'] ?? null;
        $items = Item::getAll($search);
        include __DIR__ . '/../views/items/list.php';
    }

    public function add() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $required = ['title','platform','genre','price','quantity','description'];
            foreach ($required as $f) if (!isset($_POST[$f]) || $_POST[$f]=='') $error = "Please fill out all fields";
            if (!$error && Item::add($_POST))
                header("Location: index.php?page=items");
        }
        include __DIR__ . '/../views/items/add.php';
    }

    public function edit() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $error = null;
        $id = $_GET['id'] ?? null;
        $item = Item::get($id);
        if (!$item) die("Item not found");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $required = ['title','platform','genre','price','quantity','description'];
            foreach ($required as $f) if (!isset($_POST[$f]) || $_POST[$f]=='') $error = "Please fill out all fields";
            if (!$error && Item::update($id, $_POST))
                header("Location: index.php?page=items");
        }
        include __DIR__ . '/../views/items/edit.php';
    }

    public function delete() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }
        $id = $_GET['id'] ?? null;
        Item::delete($id);
        header("Location: index.php?page=items");
    }
}