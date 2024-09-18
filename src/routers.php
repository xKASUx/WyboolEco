<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

return [
    '~^$~' => [\core\controllers\HomeController::class, 'responseHome'], // Главная страница

    '~^auth$~' => [\core\controllers\HomeController::class, 'responseAuth'], // Страница "Авторизация"
    '~^reg$~' => [\core\controllers\HomeController::class, 'responseReg'], // Страница "Регистрация"
    '~^profile$~' => [\core\controllers\HomeController::class, 'responseProfile'], // Страница "Личный кабинет"
    '~^events$~' => [\core\controllers\EventController::class, 'responseEvents'], // Страница "Мероприятия"
    '~^events/update-page/(.*)$~' => [\core\controllers\EventController::class, 'responseUpdateEvent'], // Страница "Редактирование мероприятия"
    '~^events/add-page$~' => [\core\controllers\EventController::class, 'responseCreateEvent'], // Страница "Редактирование мероприятия"
    '~^events/points-page/(.*)$~' => [\core\controllers\EventController::class, 'responsePointsEvent'], // Страница выдачи баллов экоактивистам
    '~^card-detail/(.*)$~' => [\core\controllers\EventController::class, 'responseCardDetail'], // Страница "Редактирование мероприятия"

    '~^sign-in$~' => [\core\controllers\HomeController::class, 'handlerAuth'], // Обработчик "Авторизация"
    '~^sign-up$~' => [\core\controllers\HomeController::class, 'handlerReg'], // Обработчик "Регистрация"
    '~^sign-out$~' => [\core\controllers\HomeController::class, 'handlerLogout'], // Обработчик закрытия сессии
    '~^events/update/(.*)$~' => [\core\controllers\EventController::class, 'eventUpdateById'], // Обработчик редактирования мероприятия
    '~^events/delete/(.*)$~' => [\core\controllers\EventController::class, 'responseDeleteEvent'], // Обработчик удаления мероприятия
    '~^events/part/(.*)$~' => [\core\controllers\EventController::class, 'responsePartEvent'], // Обработчик принятия участия в мероприятии
    '~^events/add$~' => [\core\controllers\EventController::class, 'responseAddEvent'], // Обработчик создания мероприятия
    '~^events/points-declare/(.*)$~' => [\core\controllers\EventController::class, 'responsePointsDeclare'], // Обработчик выдачи баллов экоактивисту
    '~^ul-confirm$~' => [\core\controllers\HomeController::class, 'handlerUlConfirm'], // Обработчик подтверждения организации
    '~^getEventsToMap$~' => [\core\controllers\EventController::class, 'getEventsToMap'], // Обработчик получения мероприятий для карты
];
