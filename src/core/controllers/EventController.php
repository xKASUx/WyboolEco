<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\controllers;

use core\models\EventModel;
use core\services\EventService;
use core\views\Views;

class EventController
{
    public $view;

    public function __construct()
    {
        $this->eventModel = new EventModel(); // Создание экземпляра модели "Мероприятия"
        $this->eventService = new EventService(); // Создания экземпляра сервиса "Мероприятия"
        $this->view = new Views(__DIR__ . '/../../../templates'); // Подключение View контроллера
    }

    public function getEventsToMap() {
        header('Content-Type: application/json');
        $cards = $this->eventModel->getEventsToMap();
		echo $cards;
    }
}
