<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\models;

use core\services\Connect;

class EventModel
{
    public $db;

    public function __construct()
    {
        $this->db = Connect::getInstanse(); // Инициализация подключения к базе данных
    }
		public function getEventsToMap() {
			$cards = $this->db->query("SELECT * FROM `events`");

			return json_encode($cards);
		}
}
