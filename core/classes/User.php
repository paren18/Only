<?php
Class User
{
    private $db;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function regist($name, $email, $phone, $password, $password2) {
        $User = $this->db->query("SELECT * FROM users WHERE email = ? OR name = ? OR phone = ?", [$email, $name, $phone])->fetch();

        if (!$User) {
            if ($password == $password2) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $this->db->query("INSERT INTO users (`name`,`phone`,`email`,`password`) VALUES (?,?,?,?)", [$name, $phone, $email, $hashedPassword]);
                return 'Вы зарегистрировались';
            } else {
                return 'Разные пароли';
            }
        } else {
            return 'Пользователь с таким именем, email или телефоном уже существует';
        }
    }
    public function  loginByEmail($login,$password){
       $user=$this->db->query("SELECT * FROM users WHERE `email` = :email", ['email' => $login])->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            return 'Вы авторизировались';
        } else {
            return 'Неправильный email или пароль';
        }
    }
    public function loginByPhone($login,$password){
        $user=$this->db->query("SELECT * FROM users WHERE `phone` = :phone", ['phone' => $login])->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            return 'Вы авторизировались';
        } else {
            return 'Неправильный телефон или пароль';
        }
    }
    public function changesUser($id, $name, $email, $phone, $password) {
        $this->db->query("UPDATE users SET `name` = ?, `email` = ?, `phone` = ?,`password` = ? WHERE id = ?", [$name,$email,$phone,$password,$id]);
        return 'Данные изменены';

    }

}