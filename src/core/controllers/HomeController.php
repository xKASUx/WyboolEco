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
        $this->view->responseHtml('main.php');
    }
}
