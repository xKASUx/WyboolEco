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

    public function handlerAuth($data) 
    {
        $email = $data['email'];
        $password = $data['password'];
    
        $dataCheckEmail = $this->supportModel->checkEmail($email);
    
        $dataCount = $dataCheckEmail[0]['COUNT(*)'];
    
        if ($dataCount == 0) {
            echo "Аккаунт с данной почтой не найден";
        } else {
            $userData = $this->supportModel->checkSign($email);
            
            if (password_verify($password, $userData[0]['user_password'])) {
                $_SESSION['user'] = [
                    'id' => $userData[0]['user_id'],
                    'role' => $userData[0]['user_role'],
                    'name' => $userData[0]['user_name'],
                    'surname' => $userData[0]['user_surname'],
                    'patronymic' => $userData[0]['user_patronymic'],
                    'phone' => $userData[0]['user_phone'],
                    'email' => $userData[0]['user_email'],
                    'ul_confirm' => $userData[0]['user_ul_confirm'],
                    'points' => $userData[0]['user_points']
                ];
    
                header('Location: /profile');
            } else {
                echo 'Пароль неверный';
            }
        }
    }

        public function handlerReg($data) 
        {
            $name = $data['name'];
            $surname = $data['surname'];
            $patronymic = $data['patronymic'];
            $email = $data['email'];
            $phone = $data['phone'];
            $password = $data['password'];
            $confirm_password = $data['confirm_password'];
            $role = $data['role'];
        
            $dataCheckEmail = $this->supportModel->checkEmail($email);
            $dataCount = $dataCheckEmail[0]['COUNT(*)'];
        
            if ($dataCount != 0) {
                echo "Аккаунт с данной почтой уже существует";
            } else {
                if ($password === $confirm_password) {
                    if ($patronymic == '') {
                        $patronymic = NULL;
                    }
        
                    if ($phone == '+7 (___) ___-__-__') {
                        $phone = NULL;
                    }
        
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
                    $this->supportModel->handlerReg($name, $surname, $patronymic, $email, $phone, $hashedPassword, $role);
        
                    $data = $this->supportModel->checkSign($email);
        
                    $_SESSION['user']['id'] = $data[0]['user_id'];
                    $_SESSION['user']['role'] = $data[0]['user_role'];
                    $_SESSION['user']['name'] = $data[0]['user_name'];
                    $_SESSION['user']['surname'] = $data[0]['user_surname'];
                    $_SESSION['user']['patronymic'] = $data[0]['user_patronymic'];
                    $_SESSION['user']['phone'] = $data[0]['user_phone'];
                    $_SESSION['user']['email'] = $data[0]['user_email'];
                    $_SESSION['user']['ul_confirm'] = $data[0]['user_ul_confirm'];
                    $_SESSION['user']['points'] = $data[0]['user_points'];
        
                    unset($_SESSION['user']['password']);
        
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

    public function handlerUlConfirm() // Обработчик подтверждения организации
    {
        $updated = $this->supportModel->handlerUlConfirm();

        session_start();
        $user_id = $_SESSION['user']['id'];
        $user_role = $_SESSION['user']['role'];
        $user_surname = $_SESSION['user']['surname'];
        $user_name = $_SESSION['user']['name'];
        $user_patronymic = $_SESSION['user']['patronymic'];
        $user_phone = $_SESSION['user']['phone'];
        $user_email = $_SESSION['user']['email'];
        $user_password = $_SESSION['user']['password'];
        $user_points = $_SESSION['user']['points'];
        $user_ul_confirm = $_SESSION['user']['ul_confirm'];

        session_unset();
        session_destroy();

        session_start();

        $_SESSION['user']['id'] = $user_id;
        $_SESSION['user']['role'] = $user_role;
        $_SESSION['user']['surname'] = $user_surname;
        $_SESSION['user']['name'] = $user_name;
        $_SESSION['user']['patronymic'] = $user_patronymic;
        $_SESSION['user']['phone'] = $user_phone;
        $_SESSION['user']['email'] = $user_email;
        $_SESSION['user']['password'] = $user_password;
        $_SESSION['user']['points'] = $user_points;
        $_SESSION['user']['ul_confirm'] = 1;
        
        header('Location: /profile');
    }
}
