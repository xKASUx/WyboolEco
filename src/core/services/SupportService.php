<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\services;

use core\models\SupportModel;

class SupportService
{
    public $supportModel;

    public function __construct()
    {
        $this->supportModel = new SupportModel(); // Создания экземпляра модели "Дополнительно"
    }

    public function handlerAuth($data) {
        $email = $data['email'];
        $password = $data['password'];

        $dataCheckEmail = $this->supportModel->checkEmail($email);

        $dataCount = $dataCheckEmail[0]['COUNT(*)'];

        if ($dataCount == 0) {
            echo "Аккаунт с данной почтой не найден";
        } else {
            $data = $this->supportModel->checkSign($email);
            if ($data[0]['user_password'] === $password) {
                $_SESSION['user']['id'] = $data[0]['user_id'];
                $_SESSION['user']['role'] = $data[0]['user_role'];
                $_SESSION['user']['name'] = $data[0]['user_name'];
                $_SESSION['user']['surname'] = $data[0]['user_surname'];
                $_SESSION['user']['patronymic'] = $data[0]['user_patronymic'];
                $_SESSION['user']['points'] = $data[0]['user_points'];
                if (empty($_SESSION['user'])) {
                    header('Location: /auth');
                } else {
                    header('Location: /profile');
                }
            } else {
                echo 'Пароль неверный';
            }
        }
    }

    public function handlerReg($data) {
        $name = $data['name'];
        $surname = $data['surname'];
        $patronymic = $data['patronymic'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $confirm_password = $data['confirm_password'];

        $dataCheckEmail = $this->supportModel->checkEmail($email);

        $dataCount = $dataCheckEmail[0]['COUNT(*)'];

        if ($dataCount != 0) {
            echo "Аккаунт с данной почтой уже существует";
        } else {
            if ($password === $confirm_password) {
                if ($patronymic == '') {
                    $patronymic = NULL;
                }

                if ($phone == '') {
                    $phone = NULL;
                }

                $query = $this->supportModel->handlerReg($name, $surname, $patronymic, $email, $phone, $password);

                $_SESSION['user']['id'] = $data['user_id'];
                $_SESSION['user']['role'] = $data['user_role'];
                $_SESSION['user']['name'] = $data['user_name'];
                $_SESSION['user']['surname'] = $data['user_surname'];
                $_SESSION['user']['patronymic'] = $data['user_patronymic'];
                $_SESSION['user']['points'] = $data['user_points'];
                if (empty($_SESSION['user'])) {
                    header('Location: /auth');
                } else {
                    header('Location: /profile');
                }
            } else {
                echo 'Пароли не совпадают';
            }
        }
    }

    public function handlerLogout() {
        session_unset();
        session_destroy();
        header('Location: /auth');
    }
}
