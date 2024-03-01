<?php
require_once CLASSES. '/User.php';
session_start();
$user = new User($db);

$title = 'Главная';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone'])){
        $_SESSION['message'] = 'Не все данные заполнены';
        header('Location: /');
        exit;
    }else{
        $_SESSION['message']= $user->regist($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['password'],$_POST['password2']);
        header('Location: /');
        exit;
    }


}

require_once '../views/index.tpl.php';