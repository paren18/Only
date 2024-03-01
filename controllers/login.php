<?php
require_once CLASSES . '/User.php';
session_start();
$user = new User($db);
$title = 'Логин';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = $user->loginByEmail($login, $password);
    } else {
        $_SESSION['message'] = $user->loginByPhone($login, $password);
    }
}

require_once '../views/login.tpl.php';