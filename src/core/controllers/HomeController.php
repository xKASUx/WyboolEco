<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\controllers;

use core\models\SupportModel;
use core\services\SupportService;
use core\views\Views;

class HomeController
{
    public $view;

    public function __construct()
    {
        $this->supportModel = new SupportModel(); // Создание экземпляра модели "Допольнительно"
        $this->supportService = new SupportService(); // Создания экземпляра сервиса "Дополнительно"
        $this->view = new Views(__DIR__ . '/../../../templates'); // Подключение View контроллера
    }

    public function responseHome() // Вывод страницы "Главная"
    {
        $cards = $this->supportModel->getCards();
        $this->view->responseHtml('main.php', [
            'cards'=>$cards,
        ]);
    }

    public function responseAuth() // Вывод страницы "Авторизация"
    {
        if (!isset($_SESSION['user'])) {
            $this->view->responseHtml('support/auth.php');
        } else {
            header('Location: /profile');
        }
    }

    public function responseReg() // Вывод страницы "Регистрация"
    {
        if (!isset($_SESSION['user'])) {
            $this->view->responseHtml('support/reg.php');
        } else {
            header('Location: /profile');
        }
    }

    public function handlerAuth() // Обработчик "Авторизация"
    {
        $this->supportService->handlerAuth($_POST);
    }

    public function handlerReg() // Обработчик "Регистрация"
    {
        $this->supportService->handlerReg($_POST);
    }

    public function handlerLogout() // Обработчик закрытия сессии
    {
        $this->supportService->handlerLogout();
    }
    
    public function responseProfile() // Вывод страницы "Личный кабинет"
    {
        if (!isset($_SESSION['user'])) {
            $this->view->responseHtml('support/auth.php');
        } else {
            $current_events = $this->supportModel->getCurrentEvents();
            $this->view->responseHtml('support/profile.php', [
                'role'=>$_SESSION['user']['role'],
                'current_events'=>$current_events,
            ]);
        }
    }
    
    public function handlerUlConfirm() // Обработчик подтверждения организации
    {
        $query = $this->supportService->handlerUlConfirm();

        if($query) {
            session_start();
            $_SESSION['user']['ul_confirm'] = 1;
        };

        header('Location: /profile');
    }
}
