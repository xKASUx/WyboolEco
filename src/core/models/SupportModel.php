<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\models;

use core\services\Connect;

class SupportModel
{
    public $db;

    public function __construct()
    {
        $this->db = Connect::getInstanse(); // Инициализация подключения к базе данных
    }

    public function checkEmail($email) // Проверка на существующего пользователя
    {
        return $this->db->query(
            "SELECT COUNT(*) FROM `users` WHERE `user_email` = :email",
            [':email' => $email],
        );
    }

    public function checkSign($email) // Получение пользователя из базы данных по почте
    {
        return $this->db->query(
            "SELECT * FROM `users` WHERE `user_email` = :email",
            [':email' => $email],
        );
    }

    public function handlerReg($name, $surname, $patronymic, $email, $phone, $password) {
        $query = $this->db->query("INSERT INTO `users` (`user_name`, `user_surname`, `user_patronymic`, `user_phone`, `user_email`, `user_password`) VALUES (:name, :surname, :patronymic, :phone, :email, :password)", [
            ':name'=>$name,
            ':surname'=>$surname,
            ':patronymic'=>$patronymic,
            ':phone'=>$phone,
            ':email'=>$email,
            ':password'=>$password,
        ]);

        $user_id = $this->db->lastInsertId();

        return [
            'user_id'=>$user_id,
            'user_role'=>4,
            'user_name'=>$name,
            'user_surname'=>$surname,
            'user_patronymic'=>$patronymic,
            'user_points'=>0,
        ];
    }
}
