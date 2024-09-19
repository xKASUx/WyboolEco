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

    public function handlerReg($name, $surname, $patronymic, $email, $phone, $password, $role) // Регистрация пользователя
    {
        $query = $this->db->query("INSERT INTO `users` (`user_role`, `user_name`, `user_surname`, `user_patronymic`, `user_phone`, `user_email`, `user_password`) VALUES (:role, :name, :surname, :patronymic, :phone, :email, :password)", [
            ':role' => $role,
            ':name' => $name,
            ':surname' => $surname,
            ':patronymic' => $patronymic,
            ':phone' => $phone,
            ':email' => $email,
            ':password' => $password,
        ]);
    
        $user_id = $this->db->lastInsertId();
    
        return [
            'user_id' => $user_id,
            'user_role' => $role,
            'user_name' => $name,
            'user_surname' => $surname,
            'user_patronymic' => $patronymic,
            'user_points' => 0,
        ];
    }      

    public function handlerUlConfirm()
    {
        return $this->db->query(
            "UPDATE `users` SET `user_ul_confirm` = 1 WHERE `user_id` = :user_id",
            [':user_id' => $_SESSION['user']['id']],
        );
    }    

    public function getCards()
    {
        return $this->db->query("SELECT * FROM `events` ORDER BY `event_id` DESC LIMIT 6");
    }

    public function getCurrentEvents() {
        return $this->db->query("
            SELECT e.* 
            FROM `sh_event_user` seu
            JOIN `events` e ON seu.event_id = e.event_id
            WHERE seu.`user_id` = :user_id
            ORDER BY e.`event_date` ASC
        ", [
            ':user_id' => $_SESSION['user']['id'],
        ]);
    }    
}
