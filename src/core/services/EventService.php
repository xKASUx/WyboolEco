<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\services;

use core\models\EventModel;

class EventService
{
    public $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel(); // Создания экземпляра модели "Мероприятия"
    }
}
