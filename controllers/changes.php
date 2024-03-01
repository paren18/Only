<?php
global $db;
require_once CLASSES . '/User.php';
session_start();
$user = new User($db);
$title = 'Изменения';
$loginuser = $_SESSION['user'];

if (empty($loginuser)) {
    header("Location: /");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = empty($_POST['name']) ? $loginuser['name'] : $_POST['name'];
    $email = empty($_POST['email']) ? $loginuser['email'] : $_POST['email'];
    $phone = empty($_POST['phone']) ? $loginuser['phone'] : $_POST['phone'];
    $password = empty($_POST['password']) ? $loginuser['password'] : $_POST['password'];
    $_SESSION['message'] = $user->changesUser($loginuser['id'], $name, $email, $phone, $password);
    header('Location: /');
    exit;
}

require_once VIEWS . '/changes.tpl.php';

