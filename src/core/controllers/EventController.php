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

    public function responseEvents() {
        $events = $this->eventModel->getEventsByUser($_SESSION['user']['id']);
        $this->view->responseHtml('org/org-events.php', [
            'events'=>$events,
        ]);
    }
    
    public function responseUpdateEvent($event_id) {
        $event = $this->eventModel->getEventById($event_id);
        $this->view->responseHtml('org/update-event.php', [
            'event'=>$event[0],
        ]);
    }

    public function responseCardDetail($event_id) {
        $event = $this->eventModel->getEventById($event_id);
        $this->view->responseHtml('support/detail-event.php', [
            'event'=>$event[0],
        ]);
    }

    public function responseCreateEvent() {
        $this->view->responseHtml('org/add-event.php');
    }

    public function responseDeleteEvent($event_id) {
        $event = $this->eventModel->deleteEventById($event_id);
        header('Location: /events');
    }

    public function eventUpdateById($event_id) {
        $this->eventModel->eventUpdateById($event_id, $_POST);
        header('Location: /events');
    }

    public function responseAddEvent() {
        $this->eventModel->responseAddEvent($_POST);
        header('Location: /events');
    }

    public function responsePartEvent($event_id) {
        $this->eventModel->responseAddPartEvent($event_id);
        header('Location: /profile');
    }

    public function responsePointsEvent($event_id) {
        $users = $this->eventModel->getUsersEvent($event_id);
        $this->view->responseHtml('org/points-page.php', [
            'users'=>$users,
            'event_id'=>$event_id,
        ]);
    }

    public function responsePointsDeclare($id_info) {
        $info_id_array = explode('/', $id_info);
        $user_id = $info_id_array[0];
        $event_id = $info_id_array[1];

        $this->eventModel->pointsDeclareToUser($user_id, $event_id);
        header('Location: /events/points-page/' . $event_id);
    }
}
