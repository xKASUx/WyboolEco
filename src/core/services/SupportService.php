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
}
