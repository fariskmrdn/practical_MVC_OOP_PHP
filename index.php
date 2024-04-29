<?php
// Include the controller
require_once('app/controllers/UserController.php');

// Instantiate the controller
$controller = new UserController();

// Route requests based on HTTP method and URL parameters
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action === 'create') {
            $controller->create();
        } elseif ($action === 'edit' && isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        } elseif ($action === 'show' && isset($_GET['id'])) {
            $controller->show($_GET['id']);
        } else {
            $controller->index();
        }
    } else {
        $controller->index();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'store') {
            $controller->store();
        } elseif ($action === 'update' && isset($_POST['id'])) {
            $controller->update($_POST['id']);
        } elseif ($action === 'destroy' && isset($_POST['id'])) {
            $controller->destroy($_POST['id']);
        } else {
            $controller->index();
        }
    } else {
        $controller->index();
    }
}
