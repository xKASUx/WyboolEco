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
}
